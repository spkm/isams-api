<?php

namespace spkm\IsamsApi\Generator\Emit;

use Illuminate\Support\Str;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\PhpNamespace;
use ReflectionClass;
use ReflectionNamedType;
use RuntimeException;
use spkm\IsamsApi\Generator\Naming\ResourceNaming;
use spkm\IsamsApi\Generator\Operations;

/**
 * Writes the resource classes: a method per generated or hand-written request, named for its action, under the area
 * and its children; then the HasResources trait.
 *
 * @phpstan-import-type GeneratedOperation from Operations
 * @phpstan-import-type HandwrittenOperation from Operations
 */
final class ResourceEmitter
{
    /** @var array<string, array<string, array{method: Method, request: string, short: string}>> resource class => method name => method, its request class and its short name */
    private array $resources = [];

    /** @var list<string> the areas' resource classes */
    private array $areas = [];

    /** @var array<string, array<string, string>> resource class => accessor => child resource class */
    private array $children = [];

    /** @var array<string, list<Method>> resource class => its request methods, as written */
    private array $calls = [];

    public function __construct(private readonly PhpFiles $files, private readonly ResourceNaming $resourceNaming) {}

    /**
     * @return list<string>
     */
    public function areas(): array
    {
        return $this->areas;
    }

    /**
     * @return array<string, array<string, string>>
     */
    public function children(): array
    {
        return $this->children;
    }

    /**
     * @return array<string, list<Method>>
     */
    public function calls(): array
    {
        return $this->calls;
    }

    /**
     * Adds an operation's method to its resource, and the resource and its parents to those to write.
     *
     * @param  GeneratedOperation|HandwrittenOperation  $operation
     */
    public function add(array $operation): void
    {
        $resource = $this->resourceNaming->resourceFor($operation['namespace']);
        $requestClass = ltrim($operation['class'], '\\');
        $name = lcfirst((string) preg_replace('/Request$/', '', class_basename($requestClass)));
        $method = (new Method($name))->setPublic();

        if ($operation['source'] === 'generated') {
            Signatures::addParameters($method, $operation['parameters'], new PhpNamespace('Unused'), false);
        } else {
            foreach ((new ReflectionClass($requestClass))->getConstructor()?->getParameters() ?? [] as $parameter) {
                $added = $method->addParameter($parameter->getName());
                $type = $parameter->getType();
                $added->setType($type instanceof ReflectionNamedType ? ($type->allowsNull() && $type->getName() !== 'mixed' ? '?' : '').$type->getName() : (string) $type);

                if ($parameter->isDefaultValueAvailable()) {
                    $added->setDefaultValue($parameter->getDefaultValue());
                }
            }
        }

        $paged = $operation['paginatable'] ?? is_subclass_of($requestClass, 'Saloon\PaginationPlugin\Contracts\Paginatable');

        if ($paged) {
            $method->removeParameter('page')->removeParameter('pageSize');
        }

        $arguments = array_map(fn (string $parameter) => "$parameter: \$$parameter", array_keys($method->getParameters()));
        $send = 'new \\'.$requestClass.'('.implode(', ', $arguments).')';
        $model = $operation['response']['model'] ?? null;
        [$returnType, $returnComment] = match (true) {
            $paged => ['Illuminate\Support\LazyCollection', '\\Illuminate\Support\LazyCollection<int, \\'.$model.'>'],
            $operation['response']['shape'] === 'list' => ['Illuminate\Support\Collection', '\\Illuminate\Support\Collection<int, '.($model ? '\\'.$model : 'mixed').'>'],
            $operation['response']['shape'] === 'one' => [($model && ! str_ends_with($operation['path'], '}') ? '?' : '').($model ?? 'array'), $model ? null : 'array<mixed>'],
            $operation['response']['shape'] === 'created' => ['spkm\IsamsApi\Data\Created', null],
            $operation['response']['shape'] === 'file' => ['spkm\IsamsApi\Data\File', null],
            $operation['response']['shape'] === 'raw' => ['mixed', null],
            default => ['bool', null],
        };

        $method->setReturnType($returnType)->setBody(match (true) {
            $paged => "return \$this->each($send, \\{$model}::class);",
            $returnType === 'bool' => "\$this->fetch($send);\n\nreturn true;",
            default => "return \$this->fetch($send);",
        });

        if ($returnComment !== null) {
            $method->addComment("@return $returnComment");
        }

        $method->addComment('@see \\'.$requestClass);

        if (isset($this->resources[$resource][$name])) {
            throw new RuntimeException("Two requests would both be {$resource}::{$name}(); add a \"class\" override for {$operation['id']}.");
        }

        $this->resources[$resource][$name] = [
            'method' => $method,
            'request' => $requestClass,
            'short' => $operation['override']['method'] ?? $this->resourceNaming->actionName($requestClass, $operation['namespace'], $operation['tag'], $operation['path']),
        ];

        for ($child = $resource; ($parent = $this->resourceNaming->parentResource($child)) !== null; $child = $parent) {
            $this->resources[$parent] ??= [];
        }
    }

    /**
     * Writes a class per resource, with a method per request and an accessor per child resource, and the HasResources
     * trait that reaches each area's resource from the connector.
     */
    public function emit(): void
    {
        ksort($this->resources);
        $areas = [];
        $children = [];
        $calls = [];

        foreach (array_keys($this->resources) as $resource) {
            $parent = $this->resourceNaming->parentResource($resource);
            $parent === null ? $areas[] = $resource : $children[$parent][lcfirst((string) preg_replace('/Resource$/', '', class_basename($resource)))] = $resource;
        }

        foreach ($this->resources as $resource => $methods) {
            [$namespace, $file] = $this->files->start(Str::beforeLast($resource, '\\'));
            $namespace->addUse('spkm\IsamsApi\Resources\IsamsResource');
            $class = $namespace->addClass(class_basename($resource))->setExtends('spkm\IsamsApi\Resources\IsamsResource');
            $childNames = $children[$resource] ?? [];
            ksort($childNames);

            foreach ($childNames as $name => $child) {
                $namespace->addUse($child);
                $class->addMethod($name)->setReturnType($child)->setBody('return new '.class_basename($child).'($this->connector);');
            }

            $shortNames = array_count_values(array_column($methods, 'short'));
            $named = [];

            foreach ($methods as $fullName => ['method' => $method, 'request' => $request, 'short' => $short]) {
                $name = $shortNames[$short] === 1 && ! isset($childNames[$short]) ? $short : $fullName;
                $named[$name] = [$method->cloneWithName($name), $request];
            }

            ksort($named);

            foreach ($named as [$method, $request]) {
                $this->useShortNames($namespace, $method, $request);
                $class->addMember($method);
            }

            $calls[$resource] = array_column($named, 0);

            $this->files->add($resource, $file);
        }

        [$namespace, $file] = $this->files->start('spkm\IsamsApi\Resources');
        $trait = $namespace->addTrait('HasResources');

        foreach ($areas as $area) {
            $namespace->addUse($area);
            $trait->addMethod(lcfirst((string) preg_replace('/Resource$/', '', class_basename($area))))
                ->setReturnType($area)
                ->setBody('return new '.class_basename($area).'($this);');
        }

        $this->files->add('spkm\IsamsApi\Resources\HasResources', $file);
        [$this->areas, $this->children, $this->calls] = [$areas, $children, $calls];
    }

    private function useShortNames(PhpNamespace $namespace, Method $method, string $request): void
    {
        preg_match_all('/\\\\([\\w\\\\]+)::class/', $method->getBody(), $models);
        $classes = [$request, ...$models[1], ...array_filter([ltrim((string) $method->getReturnType(), '?')], fn (string $type) => str_contains($type, '\\'))];

        foreach ($method->getParameters() as $parameter) {
            foreach (explode('|', ltrim((string) $parameter->getType(), '?')) as $type) {
                if (str_contains($type, '\\')) {
                    $classes[] = ltrim($type, '\\');
                }
            }
        }

        foreach ($classes as $class) {
            $short = class_basename($class);

            if (! isset($namespace->getUses()[$short]) || $namespace->getUses()[$short] === $class) {
                $namespace->addUse($class);

                $method->setBody(str_replace(['new \\'.$class.'(', '\\'.$class.'::class'], ['new '.$short.'(', $short.'::class'], $method->getBody()));
            }
        }
    }
}
