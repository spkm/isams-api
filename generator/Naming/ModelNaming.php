<?php

namespace spkm\IsamsApi\Generator\Naming;

use Illuminate\Support\Str;
use RuntimeException;
use spkm\IsamsApi\Generator\ApiSpec;
use spkm\IsamsApi\Generator\Corrections;

/**
 * Names a model from its definition, and the one enum each module's models share for a property and its values.
 */
final class ModelNaming
{
    private const MODEL_KINDS = ['Get' => '', 'Post' => 'ForCreate', 'Put' => 'ForUpdate', 'Patch' => 'ForPatch', 'Commands' => 'Command'];

    /** @var array<string, string>|null enum key => enum class */
    private ?array $enumClasses = null;

    public function __construct(private readonly ApiSpec $spec, private readonly Corrections $corrections) {}

    public function modelClass(string $definition): string
    {
        $segments = explode('.', (string) preg_replace('/\[.*$/', '', $definition));
        $kindIndex = null;

        foreach ($segments as $index => $segment) {
            if (isset(self::MODEL_KINDS[$segment])) {
                $kindIndex = $index;
            }
        }

        $kind = $kindIndex === null ? 'Get' : $segments[$kindIndex];
        $nameSegments = array_values(array_filter(array_slice($segments, ($kindIndex ?? count($segments) - 2) + 1), fn (string $segment) => $segment !== 'Collections'));
        $name = '';

        foreach ($nameSegments as $segment) {
            $segment = (string) preg_replace('/^Public(?=[A-Z])/', '', $segment);
            $name .= str_starts_with($segment, $name) && $name !== '' ? substr($segment, strlen($name)) : $segment;
        }

        if (in_array('Private', $segments, true)) {
            $name = 'Private'.$name;
        }

        $name = (string) preg_replace(['/^(?:Create|Update)(\w+)Command$/', '/(?<=\w)Dto$/'], ['$1', ''], $name);
        $name = $this->corrections->modelName($definition) ?? $name;

        $module = $segments[1] ?? 'Common';
        $area = $this->corrections->module($module) ?? Words::studly($module);

        return 'spkm\IsamsApi\Data\\'.$area.'\\'.$name.self::MODEL_KINDS[$kind];
    }

    /**
     * The enum for a model property's values.
     *
     * @param  list<string>  $values
     */
    public function enumClass(string $modelClass, string $property, array $values): string
    {
        return $this->nameEnums()[$this->enumKey($modelClass, $property, $values)];
    }

    /**
     * One enum per module, property and set of values, shared by every model with that property: named after its model
     * (or what its models' names end with in common) and the property, without repeating a word.
     *
     * @return array<string, string> enum key => enum class
     */
    public function nameEnums(): array
    {
        if ($this->enumClasses !== null) {
            return $this->enumClasses;
        }

        $groups = [];

        foreach ($this->spec->definitions() as $definition => $schema) {
            foreach ($schema['properties'] ?? [] as $property => $propertySchema) {
                if (isset($propertySchema['enum']) && preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $property) === 1) {
                    $modelClass = $this->modelClass($definition);
                    $groups[$this->enumKey($modelClass, $property, $propertySchema['enum'])][] = (string) preg_replace(['/^Private(?=[A-Z])/', '/(ForCreate|ForUpdate|ForPatch|Command)$/'], '', class_basename($modelClass));
                }
            }
        }

        $classes = [];

        foreach ($groups as $key => $models) {
            [$namespace, $property] = explode('|', $key);
            $models = array_values(array_unique($models));
            $words = array_map(fn (string $model) => Words::of($model), $models);
            $shared = $words[0];

            foreach ($words as $modelWords) {
                while ($shared !== [] && array_slice($modelWords, -count($shared)) !== $shared) {
                    array_shift($shared);
                }
            }

            $classes[$key] = $namespace.'\\Enums\\'.Words::join(count($models) === 1 ? $words[0] : $shared, Words::of(ucfirst($property)));
        }

        $renames = $this->corrections->enumNames();

        foreach ($classes as $key => $class) {
            $name = Str::after($class, 'spkm\\IsamsApi\\Data\\');
            $name = str_replace('\\Enums\\', '\\', $name);

            if (isset($renames[$name])) {
                $classes[$key] = Str::beforeLast($class, '\\').'\\'.$renames[$name];
                unset($renames[$name]);
            }
        }

        if ($renames !== []) {
            throw new RuntimeException('generator/overrides.php names things the spec does not have:'.implode('', array_map(fn (string $name) => "\n- enums.$name: no such enum", array_keys($renames))));
        }

        foreach (array_count_values($classes) as $class => $count) {
            if ($count > 1) {
                throw new RuntimeException("Several enums with different values would all be $class.");
            }
        }

        return $this->enumClasses = $classes;
    }

    /**
     * @param  list<string>  $values
     */
    private function enumKey(string $modelClass, string $property, array $values): string
    {
        return Str::beforeLast($modelClass, '\\').'|'.$property.'|'.implode(',', $values);
    }
}
