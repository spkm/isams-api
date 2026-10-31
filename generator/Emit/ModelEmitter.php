<?php

namespace spkm\IsamsApi\Generator\Emit;

use Illuminate\Support\Str;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpNamespace;
use spkm\IsamsApi\Generator\ApiSpec;
use spkm\IsamsApi\Generator\ModelRegistry;
use spkm\IsamsApi\Generator\Naming\ModelNaming;
use spkm\IsamsApi\Generator\Naming\Words;

/**
 * Writes a definition's model class, registering the models its properties refer to, and the enum for each property
 * with fixed values.
 */
final class ModelEmitter
{
    public function __construct(
        private readonly PhpFiles $files,
        private readonly ApiSpec $spec,
        private readonly ModelRegistry $models,
        private readonly ModelNaming $modelNaming,
    ) {}

    public function emit(string $definition): void
    {
        $modelClass = $this->models->classFor($definition);
        $spec = $this->spec->definition($definition) ?? ['properties' => []];
        $isPayload = ! str_ends_with($modelClass, 'Command') && preg_match('/For(Create|Update|Patch)$/', $modelClass) === 1;
        $required = $spec['required'] ?? [];

        [$namespace, $file] = $this->files->start(Str::beforeLast($modelClass, '\\'));
        $namespace->addUse('spkm\IsamsApi\Data\Data');
        $class = $namespace->addClass(class_basename($modelClass))->setExtends('spkm\IsamsApi\Data\Data')->setReadOnly();
        $constructor = $class->addMethod('__construct');
        $lists = [];
        $docs = [];
        $properties = array_filter($spec['properties'] ?? [], fn (array $property) => ($property['$ref'] ?? null) !== '#/definitions/System.IO.Stream');

        if ($isPayload) {
            $properties = array_filter($properties, fn (array $property) => ! ($property['readOnly'] ?? false));
            uksort($properties, fn (string $a, string $b) => (int) in_array($b, $required, true) <=> (int) in_array($a, $required, true));
        }

        foreach ($properties as $name => $property) {
            if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name) !== 1) {
                continue;
            }

            $isRequired = $isPayload && in_array($name, $required, true);
            [$type, $default, $doc, $item] = $this->propertyType($property, $namespace, $isPayload, $isRequired);
            $parameter = $constructor->addPromotedParameter($name)->setPublic()->setType($type);

            if (! $isRequired) {
                $parameter->setDefaultValue($default);
            }

            if ($item !== null) {
                $lists[$name] = new Literal(class_basename($item).'::class');
            }

            if ($doc !== null) {
                $docs[] = "@param  $doc  \$$name";
            }

            if (isset($property['enum'])) {
                $this->addEnum($class, $namespace, $modelClass, $name, $property['enum']);
            }
        }

        if ($lists !== []) {
            $class->addConstant('LISTS', $lists)->setProtected();
        }

        if ($docs !== []) {
            $constructor->addComment(implode("\n", $docs));
        }

        $this->files->add($modelClass, $file);
    }

    /**
     * @param  array<string, mixed>  $property
     * @return array{string, mixed, ?string, ?string}
     */
    private function propertyType(array $property, PhpNamespace $namespace, bool $isPayload, bool $isRequired): array
    {
        $nullable = $isRequired ? '' : '?';

        if (isset($property['$ref'])) {
            $reference = ApiSpec::refName($property['$ref']);
            $wrapper = $this->spec->wrapper($reference);

            if ($wrapper === null && ! $this->spec->isEmptyModel($reference)) {
                $model = $this->models->register($reference);
                $namespace->addUse($model);

                return [$nullable.$model, null, null, null];
            }

            $property = $wrapper === null
                ? ['type' => 'object']
                : ['type' => 'array', 'items' => $wrapper['item'] ? ['$ref' => '#/definitions/'.$wrapper['item']] : []];
        }

        if (($property['type'] ?? null) === 'array') {
            if (isset($property['items']['$ref']) && $this->spec->wrapper(ApiSpec::refName($property['items']['$ref'])) === null && ! $this->spec->isEmptyModel(ApiSpec::refName($property['items']['$ref']))) {
                $item = $this->models->register(ApiSpec::refName($property['items']['$ref']));
                $namespace->addUse($item);
                $namespace->addUse('Illuminate\Support\Collection');
                $doc = 'Collection<int, '.class_basename($item).'>'.($isPayload && $nullable ? '|null' : '');

                return $isPayload
                    ? [$nullable.'Illuminate\Support\Collection', null, $doc, $item]
                    : ['Illuminate\Support\Collection', new Literal('new Collection'), $doc, $item];
            }

            $itemType = match ($property['items']['type'] ?? null) {
                'integer' => 'int',
                'number' => 'float',
                'boolean' => 'bool',
                'string' => 'string',
                default => 'mixed',
            };

            return $isPayload ? [$nullable.'array', null, "list<$itemType>".($nullable ? '|null' : ''), null] : ['array', [], "list<$itemType>", null];
        }

        $type = match ($property['type'] ?? null) {
            'integer' => 'int',
            'number' => 'float',
            'boolean' => 'bool',
            'string' => ($property['format'] ?? null) === 'date-time' ? 'Carbon\CarbonImmutable' : 'string',
            default => 'array',
        };

        if ($type === 'Carbon\CarbonImmutable') {
            $namespace->addUse('Carbon\CarbonImmutable');
        }

        return [$nullable.$type, null, $type === 'array' ? 'array<string, mixed>'.($nullable ? '|null' : '') : null, null];
    }

    /**
     * @param  list<string>  $values
     */
    private function addEnum(ClassType $class, PhpNamespace $namespace, string $modelClass, string $property, array $values): void
    {
        $enumClass = $this->modelNaming->enumClass($modelClass, $property, $values);
        $namespace->addUse($enumClass);
        $class->addMethod($property.'Enum')->setReturnType('?'.$enumClass)
            ->setBody('return '.class_basename($enumClass).'::tryFrom((string) $this->'.$property.');');

        if ($this->files->has($enumClass)) {
            return;
        }

        [$enumNamespace, $file] = $this->files->start(Str::beforeLast($enumClass, '\\'));
        $enum = $enumNamespace->addEnum(class_basename($enumClass))->setType('string');
        $used = [];

        foreach ($values as $index => $value) {
            $case = Words::studly((string) $value) ?: 'Value'.$index;
            $case = ctype_digit($case[0]) ? 'Value'.$case : $case;
            $case = isset($used[$case]) ? $case.$index : $case;
            $used[$case] = true;
            $enum->addCase($case, (string) $value);
        }

        $this->files->add($enumClass, $file);
    }
}
