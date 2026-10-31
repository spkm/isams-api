<?php

namespace spkm\IsamsApi\Generator;

use Illuminate\Support\Str;

/**
 * iSAMS's pinned API spec (generator/spec), read-only: the v1 spec with the v2 definitions merged in and the property
 * corrections from generator/overrides.php applied, answering what the generator asks of it.
 */
final class ApiSpec
{
    /** The paging numbers a list definition carries beside its list. */
    public const PAGING = ['count', 'page', 'pageSize', 'totalCount', 'totalPages'];

    /** Query parameters every operation documents that the generated requests leave to the connector. */
    public const IGNORED_PARAMETERS = ['v', 'api-version'];

    /** @var array<string, mixed> the v1 spec, holding every definition */
    private array $spec;

    /** @var array<string, mixed> */
    private array $specV2;

    /** @var list<string>|null */
    private ?array $tags = null;

    /** @var list<array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool}>|null */
    private ?array $operations = null;

    /**
     * @param  array<string, array<string, array<string, mixed>>>  $properties  definition => property => schema: fields iSAMS sends that its spec leaves out
     */
    public function __construct(string $root, array $properties = [])
    {
        $this->spec = json_decode((string) file_get_contents($root.'/generator/spec/isams-v1.json'), true, flags: JSON_THROW_ON_ERROR);
        $this->specV2 = json_decode((string) file_get_contents($root.'/generator/spec/isams-v2.json'), true, flags: JSON_THROW_ON_ERROR);
        $this->spec['definitions'] += $this->specV2['definitions'];

        foreach ($properties as $definition => $added) {
            if (isset($this->spec['definitions'][$definition])) {
                $this->spec['definitions'][$definition]['properties'] = [...$this->spec['definitions'][$definition]['properties'] ?? [], ...$added];
            }
        }
    }

    /**
     * Every operation in the v1 spec, then the v2 spec's operations that differ from v1 (keyed "v2:{operationId}"). A v1
     * operation that v2 changed or dropped is superseded: the newest version takes the plain name.
     *
     * @return list<array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool}>
     */
    public function operations(): array
    {
        if ($this->operations !== null) {
            return $this->operations;
        }

        $operations = [];

        foreach (['1.0' => $this->spec, '2.0' => $this->specV2] as $version => $spec) {
            $paths = $spec['paths'];
            ksort($paths);

            foreach ($paths as $path => $methods) {
                foreach (['get', 'post', 'put', 'patch', 'delete'] as $method) {
                    $operation = $methods[$method] ?? null;

                    if (! isset($operation['operationId']) || ($version === '2.0' && $operation == ($this->spec['paths'][$path][$method] ?? null))) {
                        continue;
                    }

                    $operations[] = $version === '1.0'
                        ? ['id' => $operation['operationId'], 'method' => $method, 'path' => $path, 'spec' => $operation, 'apiVersion' => null, 'superseded' => $operation != ($this->specV2['paths'][$path][$method] ?? null)]
                        : ['id' => 'v2:'.$operation['operationId'], 'method' => $method, 'path' => $path, 'spec' => $operation, 'apiVersion' => $version, 'superseded' => false];
                }
            }
        }

        return $this->operations = $operations;
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function definitions(): array
    {
        return $this->spec['definitions'];
    }

    /**
     * @return array<string, mixed>|null
     */
    public function definition(string $name): ?array
    {
        return $this->spec['definitions'][$name] ?? null;
    }

    /**
     * Every tag the spec's operations have, cleaned.
     *
     * @return list<string>
     */
    public function tags(): array
    {
        if ($this->tags !== null) {
            return $this->tags;
        }

        $tags = [];

        foreach ($this->spec['paths'] as $operations) {
            foreach ($operations as $operation) {
                foreach ($operation['tags'] ?? [] as $tag) {
                    $tags[] = self::cleanTag($tag);
                }
            }
        }

        return $this->tags = array_values(array_unique($tags));
    }

    /**
     * The areas the operations' tags start with.
     *
     * @return list<string>
     */
    public function areas(): array
    {
        return array_values(array_unique(array_column($this->operationTags(), 0)));
    }

    /**
     * The segments the operations' tags have between their area and their resource.
     *
     * @return list<string>
     */
    public function tagSegments(): array
    {
        return array_values(array_unique(array_merge(...array_map(fn (array $parts) => array_slice($parts, 1, -1), $this->operationTags()))));
    }

    /**
     * The iSAMS modules the definitions belong to: the second segment of their names.
     *
     * @return list<string>
     */
    public function modules(): array
    {
        return array_values(array_unique(array_map(fn (string $definition) => explode('.', $definition)[1] ?? '', array_keys($this->spec['definitions']))));
    }

    /**
     * A definition that is just one list, with or without paging numbers.
     *
     * @return array{key: string, item: ?string, paged: bool}|null
     */
    public function wrapper(string $definition): ?array
    {
        $properties = $this->spec['definitions'][$definition]['properties'] ?? [];
        $lists = array_filter($properties, fn (array $property) => ($property['type'] ?? null) === 'array');

        if (count($lists) !== 1 || array_diff(array_keys($properties), [...array_keys($lists), ...self::PAGING]) !== []) {
            return null;
        }

        $key = (string) array_key_first($lists);
        $items = $lists[$key]['items'] ?? [];

        return ['key' => $key, 'item' => isset($items['$ref']) ? self::refName($items['$ref']) : null, 'paged' => isset($properties['totalPages'])];
    }

    public function isEmptyModel(string $definition): bool
    {
        $schema = $this->spec['definitions'][$definition] ?? [];

        return ($schema['properties'] ?? []) === [] && ! isset($schema['additionalProperties']);
    }

    public function hasBodylessPost(string $path): bool
    {
        $post = $this->spec['paths'][$path]['post'] ?? null;

        return $post !== null && ! array_filter($post['parameters'] ?? [], fn (array $parameter) => in_array($parameter['in'], ['body', 'formData'], true));
    }

    public static function cleanTag(string $tag): string
    {
        return trim((string) preg_replace(['/\*\* Beta \*\*/', '/\(v[\d.]+\)/', '/\s+/'], ['', '', ' '], $tag));
    }

    public static function refName(string $reference): string
    {
        return Str::after($reference, '#/definitions/');
    }

    /**
     * Each operation's first tag, cleaned and split at its dashes.
     *
     * @return list<list<string>>
     */
    private function operationTags(): array
    {
        return array_map(fn (array $operation) => explode(' - ', self::cleanTag($operation['spec']['tags'][0] ?? 'Other')), $this->operations());
    }
}
