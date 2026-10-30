<?php

namespace spkm\IsamsApi\Tests\Helpers;

use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionUnionType;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Support\JsonPatch;

/**
 * Reads the pinned iSAMS spec and the generator's manifest, and makes up sample values from the spec's types.
 */
class Spec
{
    /** @var array<string, mixed>|null */
    private static ?array $spec = null;

    /** @var array<string, mixed>|null */
    private static ?array $specV2 = null;

    /** @var array<string, mixed>|null */
    private static ?array $manifest = null;

    /** @var array<string, mixed>|null */
    private static ?array $overrides = null;

    /**
     * @return array<string, mixed>
     */
    public static function spec(): array
    {
        return self::$spec ??= json_decode((string) file_get_contents(dirname(__DIR__, 2).'/generator/spec/isams-v1.json'), true);
    }

    /**
     * @return array<string, mixed>
     */
    public static function specV2(): array
    {
        return self::$specV2 ??= json_decode((string) file_get_contents(dirname(__DIR__, 2).'/generator/spec/isams-v2.json'), true);
    }

    /**
     * Operation ids the package should account for: every v1 operation, then "v2:{id}" for each v2 operation that differs.
     *
     * @return list<string>
     */
    public static function operationIds(): array
    {
        $ids = [];

        foreach (self::spec()['paths'] as $methods) {
            foreach ($methods as $operation) {
                if (isset($operation['operationId'])) {
                    $ids[] = $operation['operationId'];
                }
            }
        }

        foreach (self::specV2()['paths'] as $path => $methods) {
            foreach ($methods as $method => $operation) {
                if (isset($operation['operationId']) && $operation != (self::spec()['paths'][$path][$method] ?? null)) {
                    $ids[] = 'v2:'.$operation['operationId'];
                }
            }
        }

        return $ids;
    }

    /**
     * @return array<string, mixed>
     */
    public static function manifest(): array
    {
        return self::$manifest ??= json_decode((string) file_get_contents(dirname(__DIR__, 2).'/generator/manifest.json'), true);
    }

    /**
     * The generator's documented correction to an operation, if any (overrides fix known mistakes in the spec).
     *
     * @return array<string, mixed>
     */
    public static function override(string $operationId): array
    {
        self::$overrides ??= require dirname(__DIR__, 2).'/generator/overrides.php';

        return self::$overrides['operations'][$operationId] ?? [];
    }

    /**
     * @return array<string, mixed>
     */
    public static function operation(string $method, string $path, string $id = ''): array
    {
        return (str_starts_with($id, 'v2:') ? self::specV2() : self::spec())['paths'][$path][strtolower($method)];
    }

    /**
     * @return array<string, array{string, string, string}> label => [operationId, method, path]
     */
    public static function generatedOperations(): array
    {
        $operations = array_filter(self::manifest()['operations'], fn (array $operation) => $operation['source'] === 'generated');

        return collect($operations)->mapWithKeys(fn (array $operation, string $id) => [$id => [$id, $operation['method'], $operation['path']]])->all();
    }

    /**
     * Made-up arguments for a request's constructor, keyed by parameter name.
     *
     * @param  class-string  $class
     * @return array<string, mixed>
     */
    public static function arguments(string $class): array
    {
        $arguments = [];

        foreach ((new ReflectionClass($class))->getConstructor()?->getParameters() ?? [] as $parameter) {
            $type = $parameter->getType();
            $types = $type instanceof ReflectionUnionType ? array_map(fn ($type) => $type->getName(), $type->getTypes()) : [$type instanceof ReflectionNamedType ? $type->getName() : 'mixed'];

            $arguments[$parameter->getName()] = match (true) {
                $parameter->isDefaultValueAvailable() => $parameter->getDefaultValue(),
                in_array(JsonPatch::class, $types, true) => JsonPatch::make()->replace('/name', 'Sample'),
                in_array(MultipartValue::class, $types, true) => new MultipartValue('file', 'made-up contents', 'sample.txt'),
                in_array('int', $types, true) => 7,
                in_array('array', $types, true) => ['name' => 'Sample'],
                default => 'sample-'.$parameter->getName(),
            };
        }

        return $arguments;
    }

    /**
     * The spec's path with each {parameter} replaced by the made-up argument of the same name.
     *
     * @param  array<string, mixed>  $arguments
     */
    public static function expectedPath(string $path, array $arguments): string
    {
        return (string) preg_replace_callback('/\{(\w+)\}/', fn (array $match) => rawurlencode((string) $arguments[lcfirst((string) preg_replace('/[^A-Za-z0-9]/', '', $match[1]))]), $path);
    }

    /**
     * A made-up object matching a definition.
     *
     * @return array<string, mixed>
     */
    public static function sample(string $definition, int $depth = 0): array
    {
        $sample = [];

        foreach (self::spec()['definitions'][$definition]['properties'] ?? [] as $name => $property) {
            $sample[$name] = self::value($property, $depth);
        }

        return $sample;
    }

    /**
     * @param  array<string, mixed>  $schema
     */
    public static function value(array $schema, int $depth = 0): mixed
    {
        if (isset($schema['$ref'])) {
            return $depth > 2 ? null : self::sample(Str::after($schema['$ref'], '#/definitions/'), $depth + 1);
        }

        return match ($schema['type'] ?? null) {
            'string' => match (true) {
                isset($schema['enum']) => $schema['enum'][0],
                ($schema['format'] ?? null) === 'date-time' => '2026-01-02T03:04:05',
                default => 'Sample text',
            },
            'integer' => 7,
            'number' => 1.5,
            'boolean' => true,
            'array' => $depth > 2 ? [] : [self::value($schema['items'] ?? [], $depth + 1)],
            default => ['key' => 'value'],
        };
    }
}
