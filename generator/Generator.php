<?php

namespace spkm\IsamsApi\Generator;

use Illuminate\Support\Str;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\Parameter;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;
use RuntimeException;

/**
 * Builds the request, model, enum and resource classes in generated/ from iSAMS's pinned API spec
 * (generator/spec), corrected by generator/overrides.php, and records each operation in generator/manifest.json.
 * Run by bin/generate.
 */
final class Generator
{
    private const PAGING = ['count', 'page', 'pageSize', 'totalCount', 'totalPages'];

    private const IGNORED_PARAMETERS = ['v', 'api-version'];

    private const VERBS = ['get' => 'Get', 'post' => 'Create', 'put' => 'Update', 'patch' => 'Patch', 'delete' => 'Delete'];

    private const STANDARD_ACTIONS = ['Get', 'GetAll', 'Post', 'Put', 'Patch', 'Delete', 'Create', 'Update'];

    private const MODEL_KINDS = ['Get' => '', 'Post' => 'ForCreate', 'Put' => 'ForUpdate', 'Patch' => 'ForPatch', 'Commands' => 'Command'];

    private const MARKER = 'Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.';

    /** @var array<string, mixed> */
    private array $spec;

    /** @var array<string, mixed> */
    private array $overrides;

    /** @var array<string, string> */
    private array $files = [];

    /** @var array<string, array<string, mixed>> */
    private array $manifest = [];

    /** @var array<string, string> definition name => model class */
    private array $models = [];

    /** @var list<string> */
    private array $modelQueue = [];

    /** @var array<string, mixed> */
    private array $specV2;

    /** @var array<string, string>|null enum key => enum class */
    private ?array $enumClasses = null;

    /** @var list<string>|null property names a generated request inherits */
    private ?array $requestProperties = null;

    /** @var list<string>|null every tag in the spec, cleaned */
    private ?array $tags = null;

    /** @var array<string, array<string, Method>> resource class => method name => method */
    private array $resources = [];

    public function __construct(private readonly string $root)
    {
        $this->spec = json_decode((string) file_get_contents($root.'/generator/spec/isams-v1.json'), true, flags: JSON_THROW_ON_ERROR);
        $this->specV2 = json_decode((string) file_get_contents($root.'/generator/spec/isams-v2.json'), true, flags: JSON_THROW_ON_ERROR);
        $this->spec['definitions'] += $this->specV2['definitions'];
        $this->overrides = require $root.'/generator/overrides.php';

        foreach ($this->overrides['properties'] ?? [] as $definition => $properties) {
            if (isset($this->spec['definitions'][$definition])) {
                $this->spec['definitions'][$definition]['properties'] = [...$this->spec['definitions'][$definition]['properties'] ?? [], ...$properties];
            }
        }
    }

    /**
     * Every generated file, keyed by its path relative to the package root.
     *
     * @return array<string, string>
     */
    public function build(array $batchEndpoints = ['contents' => [], 'section' => '']): array
    {
        $this->rejectStaleOverrides();
        $operations = $this->resolveCollisions($this->operations());

        foreach ($operations as $operation) {
            $this->manifest[$operation['id']] = array_filter([
                'method' => strtoupper($operation['method']),
                'path' => $operation['path'],
                'source' => $operation['source'],
                'class' => $operation['class'] ?? null,
                'model' => $operation['source'] === 'handwritten' ? $operation['response']['model'] : null,
                'reason' => $operation['reason'] ?? null,
                'apiVersion' => $operation['apiVersion'],
            ]);

            if ($operation['source'] === 'generated') {
                $this->emitRequest($operation);
            }

            if (in_array($operation['source'], ['generated', 'handwritten'], true)) {
                $this->addResourceMethod($operation);
            }
        }

        while ($definition = array_shift($this->modelQueue)) {
            $this->emitModel($definition);
        }

        $this->emitResources($batchEndpoints);

        ksort($this->manifest);
        ksort($this->models);
        $this->files['generator/manifest.json'] = json_encode(['operations' => $this->manifest, 'models' => $this->models], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."\n";
        ksort($this->files);

        return $this->files;
    }

    /**
     * Fails when an override names something the spec no longer has, so a correction is never silently lost when the
     * pinned spec is updated.
     */
    private function rejectStaleOverrides(): void
    {
        $operations = $this->specOperations();
        $ids = array_column($operations, 'id');
        $tags = array_map(fn (array $operation) => explode(' - ', $this->cleanTag($operation['spec']['tags'][0] ?? 'Other')), $operations);
        $areas = array_unique(array_column($tags, 0));
        $segments = array_unique(array_merge(...array_map(fn (array $parts) => array_slice($parts, 1, -1), $tags)));
        $modules = array_unique(array_map(fn (string $definition) => explode('.', $definition)[1] ?? '', array_keys($this->spec['definitions'])));
        $settings = ['class', 'method', 'handwritten', 'skip', 'response', 'multipart', 'cacheable', 'safe', 'paginatable', 'required'];
        $problems = [];

        foreach ($this->overrides['operations'] as $id => $override) {
            if (! in_array($id, $ids, true)) {
                $problems[] = "operations.$id: no such operation in the spec";
            }

            foreach (array_diff(array_keys($override), $settings) as $setting) {
                $problems[] = "operations.$id.$setting: no such setting";
            }

            $query = array_column(array_filter($operations[array_search($id, $ids, true)]['spec']['parameters'] ?? [], fn (array $parameter) => ($parameter['in'] ?? null) === 'query'), 'name');

            foreach (array_diff($override['required'] ?? [], in_array($id, $ids, true) ? $query : []) as $parameter) {
                $problems[] = "operations.$id.required: no query parameter $parameter";
            }

            foreach (array_filter([$override['response']['definition'] ?? null, $override['response']['list'] ?? null]) as $definition) {
                if (! isset($this->spec['definitions'][$definition])) {
                    $problems[] = "operations.$id.response: no such definition $definition";
                }
            }

            if (isset($override['handwritten']) && ! class_exists($override['handwritten'])) {
                $problems[] = "operations.$id.handwritten: no class {$override['handwritten']}";
            }
        }

        foreach (['models', 'properties'] as $setting) {
            foreach (array_keys($this->overrides[$setting] ?? []) as $definition) {
                if (! isset($this->spec['definitions'][$definition])) {
                    $problems[] = "$setting.$definition: no such definition in the spec";
                }
            }
        }

        foreach ([...array_map(fn ($area) => ['areas', $area], $this->overrides['areas']), ...array_map(fn ($area) => ['areaNouns', $area], array_keys($this->overrides['areaNouns'] ?? [])), ...array_map(fn ($area) => ['areaNames', $area], array_keys($this->overrides['areaNames'] ?? []))] as [$setting, $area]) {
            if (! in_array($area, $areas, true)) {
                $problems[] = "$setting.$area: no such area in the spec";
            }
        }

        foreach ($this->overrides['ignoredTagSegments'] ?? [] as $segment) {
            if (! in_array($segment, $segments, true)) {
                $problems[] = "ignoredTagSegments.$segment: no tag in the spec has this segment";
            }
        }

        foreach (array_keys($this->overrides['noiseWords'] ?? []) as $area) {
            if (! in_array($area, $areas, true)) {
                $problems[] = "noiseWords.$area: no such area in the spec";
            }
        }

        foreach (array_keys($this->overrides['modules'] ?? []) as $module) {
            if (! in_array($module, $modules, true)) {
                $problems[] = "modules.$module: no such module in the spec's definitions";
            }
        }

        if ($problems !== []) {
            throw new RuntimeException("generator/overrides.php names things the spec does not have:\n- ".implode("\n- ", $problems));
        }

        $this->enumClasses ??= $this->nameEnums();
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function operations(): array
    {
        $operations = [];

        foreach ($this->specOperations() as $operation) {
            $spec = $operation['spec'];
            $override = $this->overrides['operations'][$operation['id']] ?? [];
            $tag = $spec['tags'][0] ?? 'Other';
            $operation = [...$operation, 'override' => $override, 'tag' => $tag];

            if (isset($override['skip'])) {
                $operations[] = [...$operation, 'source' => 'skipped', 'reason' => $override['skip']];
            } elseif (isset($override['handwritten'])) {
                $operations[] = [...$operation, 'source' => 'handwritten', 'class' => $override['handwritten'], 'namespace' => $this->namespaceFor($tag), 'response' => $this->response($operation['spec'], $override)];
            } elseif (! in_array($this->tagParts($tag)['area'], $this->overrides['areas'], true)) {
                $operations[] = [...$operation, 'source' => 'pending'];
            } else {
                $operations[] = $this->describe($operation);
            }
        }

        return $operations;
    }

    /**
     * Every operation in the v1 spec, then the v2 spec's operations that differ from v1 (keyed "v2:{operationId}"). A v1
     * operation that v2 changed or dropped is superseded: the newest version takes the plain name.
     *
     * @return list<array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool}>
     */
    private function specOperations(): array
    {
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

        return $operations;
    }

    /**
     * @param  array<string, mixed>  $operation
     * @return array<string, mixed>
     */
    private function describe(array $operation): array
    {
        $spec = $operation['spec'];
        $override = $operation['override'];
        $response = $this->response($spec, $override);
        $parameters = $this->parameters($spec, $override, $operation['path']);
        $namespace = $this->namespaceFor($operation['tag']).($operation['superseded'] ? '\\V1' : '');
        $name = $override['class'] ?? $this->className($operation, $response, $parameters);

        return [...$operation,
            'source' => 'generated',
            'namespace' => $namespace,
            'class' => $namespace.'\\'.$name,
            'response' => $response,
            'parameters' => $parameters,
            'beta' => str_contains($operation['tag'], 'Beta'),
            'paginatable' => $override['paginatable'] ?? ($response['paged'] && isset($parameters['query']['page'])),
            'cacheable' => $override['cacheable'] ?? false,
            'safe' => $override['safe'] ?? true,
        ];
    }

    /**
     * @return array{area: string, middle: list<string>, resource: string}
     */
    private function tagParts(string $tag): array
    {
        $parts = explode(' - ', $this->cleanTag($tag));
        $resource = count($parts) > 1 ? (string) end($parts) : '';

        return [
            'area' => $parts[0],
            'middle' => array_values(array_diff(array_slice($parts, 1, -1), $this->overrides['ignoredTagSegments'] ?? [])),
            'resource' => $this->commandsResource($parts[0], $resource),
        ];
    }

    /**
     * "X Commands" tags share X's namespace, or its plural's when the area has a tag for that.
     */
    private function commandsResource(string $area, string $resource): string
    {
        if (! str_ends_with($resource, ' Commands')) {
            return $resource;
        }

        $resource = substr($resource, 0, -strlen(' Commands'));
        $this->tags ??= collect($this->spec['paths'])->flatten(1)->pluck('tags')->flatten()->map($this->cleanTag(...))->unique()->values()->all();

        return in_array($area.' - '.Str::plural($resource), $this->tags, true) ? Str::plural($resource) : $resource;
    }

    private function cleanTag(string $tag): string
    {
        return trim((string) preg_replace(['/\*\* Beta \*\*/', '/\(v[\d.]+\)/', '/\s+/'], ['', '', ' '], $tag));
    }

    private function namespaceFor(string $tag): string
    {
        $parts = $this->tagParts($tag);
        $words = array_values(array_filter(explode(' ', $parts['resource'])));
        $nouns = $this->overrides['areaNouns'][$parts['area']] ?? [];

        while ($words !== [] && in_array($words[0], $nouns, true)) {
            array_shift($words);
        }

        $segments = [$this->areaName($parts['area'])];
        $ancestors = array_map($this->singularWord(...), [...$this->words($segments[0]), ...explode(' ', $parts['area'])]);

        foreach ([...$parts['middle'], implode(' ', $words)] as $segment) {
            $segmentWords = $this->withoutNoise($parts['area'], array_values(array_filter(explode(' ', $segment))));

            $areaHead = $this->singularWord((string) last(explode(' ', $parts['area'])));

            while ($segmentWords !== [] && in_array($this->singularWord($segmentWords[0]), $ancestors, true)
                && (count($segmentWords) > 1 || $this->singularWord($segmentWords[0]) === $areaHead)) {
                array_shift($segmentWords);
            }

            if ($segmentWords !== [] && ! str_ends_with((string) end($segments), $this->studly(implode(' ', $segmentWords)))) {
                $segments[] = $this->studly(implode(' ', $segmentWords));
                $ancestors = [...$ancestors, ...array_map($this->singularWord(...), $segmentWords)];
            }
        }

        return 'spkm\IsamsApi\Requests\\'.implode('\\', $segments);
    }

    /**
     * The words without the area's noise words (overrides "noiseWords"), which iSAMS adds to names without meaning.
     *
     * @param  list<string>  $words
     * @return list<string>
     */
    private function withoutNoise(string $area, array $words): array
    {
        $noise = array_map($this->singularWord(...), $this->overrides['noiseWords'][$area] ?? []);

        return array_values(array_filter($words, fn (string $word) => ! in_array($this->singularWord($word), $noise, true)));
    }

    private function singularWord(string $word): string
    {
        return strtolower(Str::singular($word));
    }

    private function areaName(string $area): string
    {
        return $this->overrides['areaNames'][$area] ?? $this->studly($area);
    }

    /**
     * @param  array<string, mixed>  $operation
     * @param  array<string, mixed>  $response
     * @param  array<string, mixed>  $parameters
     */
    private function className(array $operation, array $response, array $parameters): string
    {
        $tag = $this->tagParts($operation['tag']);
        $words = $this->withoutNoise($tag['area'], explode(' ', $tag['resource'] ?: $tag['area'])) ?: explode(' ', $tag['resource'] ?: $tag['area']);
        $head = (string) end($words);
        $uncountable = in_array($head, $this->overrides['uncountable'] ?? [], true);
        $plural = $this->studly(implode(' ', [...array_slice($words, 0, -1), $uncountable ? $head : Str::plural(Str::singular($head))]));
        $singular = $this->studly(implode(' ', [...array_slice($words, 0, -1), $uncountable ? $head : Str::singular($head)]));
        $action = $this->action($operation['spec']);
        $bodyIsList = ($parameters['body']['list'] ?? false) === true;

        if (in_array($action, self::STANDARD_ACTIONS, true)) {
            $method = $operation['method'];
            $verb = self::VERBS[$method];
            $endsWithParameter = str_ends_with($operation['path'], '}');

            if ($method === 'post' && $parameters['body'] === null && $endsWithParameter) {
                $verb = 'Add';
            } elseif ($method === 'delete' && $endsWithParameter && $this->hasBodylessPost($operation['path'])) {
                $verb = 'Remove';
            }

            preg_match('/\{(\w+)\}$/', $operation['path'], $lastParameter);
            $endsWithOwnId = isset($lastParameter[1]) && ($lastParameter[1] === 'id' || str_ends_with(strtolower($lastParameter[1]), strtolower(Str::singular($head)).'id'));

            $noun = match ($method) {
                'get' => $response['shape'] === 'list' && ! $endsWithOwnId ? $plural : $singular,
                default => $bodyIsList ? $plural : $singular,
            };

            return $verb.$noun.'Request';
        }

        $name = $this->studly($action);

        if (! str_contains($name, $singular) && ! str_contains($name, $plural)) {
            preg_match_all('/[A-Z][a-z]*/', $name, $actionWords);
            [$verb, $rest] = [$actionWords[0][0] ?? '', array_slice($actionWords[0], 1)];
            $noun = $singular;

            for ($count = count($words); $count > 0; $count--) {
                $tail = array_slice($words, -$count);
                $start = array_slice($rest, 0, $count);

                if ($start !== [] && $this->studly(Str::singular(implode(' ', $tail))) === Str::singular(implode('', $start))) {
                    $noun = $this->studly(implode(' ', array_slice($words, 0, -$count)));
                    break;
                }
            }

            $name = (string) preg_replace('/^([A-Z][a-z]*)/', '$1'.$noun, $name);
        }

        if (($parameters['body']['kind'] ?? null) === 'patch') {
            $name = (string) preg_replace('/^Update(?=[A-Z])/', 'Patch', $name);
        }

        return $name.'Request';
    }

    /**
     * @param  array<string, mixed>  $spec
     */
    private function action(array $spec): string
    {
        $action = Str::after($spec['operationId'], '_');
        $names = array_values(array_map(
            fn (array $parameter) => ucfirst(strtolower((string) $parameter['name'])),
            array_filter($spec['parameters'] ?? [], fn (array $parameter) => ! in_array($parameter['name'], [...self::IGNORED_PARAMETERS, '$filter'], true)),
        ));

        for ($count = count($names); $count > 0; $count--) {
            $suffix = 'By'.implode('', array_slice($names, 0, $count));

            if (str_ends_with($action, $suffix)) {
                $action = substr($action, 0, -strlen($suffix));
                break;
            }
        }

        return (string) preg_replace(['/Async$/', '/^GetAll(?=[A-Z])/', '/(?<=^Get)ById$/'], ['', 'Get', ''], $action);
    }

    private function hasBodylessPost(string $path): bool
    {
        $post = $this->spec['paths'][$path]['post'] ?? null;

        return $post !== null && ! array_filter($post['parameters'] ?? [], fn (array $parameter) => in_array($parameter['in'], ['body', 'formData'], true));
    }

    /**
     * @param  list<array<string, mixed>>  $operations
     * @return list<array<string, mixed>>
     */
    private function resolveCollisions(array $operations): array
    {
        $byClass = [];

        foreach ($operations as $index => $operation) {
            if ($operation['source'] === 'generated') {
                $byClass[$operation['class']][] = $index;
            }
        }

        foreach (array_filter($byClass, fn (array $indexes) => count($indexes) > 1) as $class => $indexes) {
            usort($indexes, fn (int $a, int $b) => strlen($operations[$a]['path']) <=> strlen($operations[$b]['path']));
            array_shift($indexes);

            foreach ($indexes as $index) {
                $path = $operations[$index]['path'];
                preg_match_all('/\{(\w+)\}/', $path, $parameters);
                $segments = array_values(array_filter(explode('/', $path), fn (string $segment) => $segment !== '' && ! str_starts_with($segment, '{')));
                $suffix = str_ends_with($path, '}') && $parameters[1] !== []
                    ? 'By'.ucfirst((string) end($parameters[1]))
                    : $this->studly((string) end($segments));

                $operations[$index]['class'] = (string) preg_replace('/Request$/', $suffix.'Request', $class);
            }
        }

        $classes = array_column(array_filter($operations, fn (array $operation) => $operation['source'] === 'generated'), 'class');
        $duplicates = array_keys(array_filter(array_count_values($classes), fn (int $count) => $count > 1));

        if ($duplicates !== []) {
            throw new RuntimeException('Request names still clash; add a "class" override for: '.implode(', ', $duplicates));
        }

        return $operations;
    }

    /**
     * @param  array<string, mixed>  $spec
     * @param  array<string, mixed>  $override
     * @return array{shape: string, model: ?string, resultKey: string, paged: bool}
     */
    private function response(array $spec, array $override): array
    {
        $codes = array_filter(array_keys($spec['responses']), fn (int|string $code) => $code >= 200 && $code < 300);
        sort($codes);
        $code = (int) ($codes[0] ?? 200);
        $schema = $spec['responses'][$code]['schema'] ?? null;
        $produces = implode(',', $spec['produces'] ?? []);
        $none = ['shape' => 'none', 'model' => null, 'resultKey' => '', 'paged' => false];

        $response = match (true) {
            isset($override['response']['definition']) => $this->responseForDefinition($override['response']['definition']),
            isset($override['response']['list']) => ['shape' => 'list', 'model' => $override['response']['list'], 'resultKey' => $override['response']['key'] ?? '', 'paged' => $override['response']['paged'] ?? false],
            isset($override['response']) => [...$none, 'shape' => $override['response']],
            $code === 201 => [...$none, 'shape' => 'created'],
            ($schema['type'] ?? null) === 'file', str_contains($produces, 'image/') || str_contains($produces, 'octet-stream') => [...$none, 'shape' => 'file'],
            $schema === null => $none,
            isset($schema['$ref']) => $this->responseForDefinition($this->refName($schema['$ref'])),
            ($schema['type'] ?? null) === 'array' => [...$none, 'shape' => 'list', 'model' => isset($schema['items']['$ref']) ? $this->refName($schema['items']['$ref']) : null],
            default => [...$none, 'shape' => 'raw'],
        };

        if ($response['model'] !== null) {
            $response['model'] = $this->isEmptyModel($response['model']) ? null : $this->queueModel($response['model']);
        }

        return $response;
    }

    /**
     * @return array{shape: string, model: ?string, resultKey: string, paged: bool}
     */
    private function responseForDefinition(string $definition): array
    {
        $wrapper = $this->wrapper($definition);

        if ($wrapper === null) {
            return ['shape' => 'one', 'model' => $definition, 'resultKey' => '', 'paged' => false];
        }

        return ['shape' => 'list', 'model' => $wrapper['item'], 'resultKey' => $wrapper['key'], 'paged' => $wrapper['paged']];
    }

    /**
     * A definition that is just one list, with or without paging numbers.
     *
     * @return array{key: string, item: ?string, paged: bool}|null
     */
    private function wrapper(string $definition): ?array
    {
        $properties = $this->spec['definitions'][$definition]['properties'] ?? [];
        $lists = array_filter($properties, fn (array $property) => ($property['type'] ?? null) === 'array');

        if (count($lists) !== 1 || array_diff(array_keys($properties), [...array_keys($lists), ...self::PAGING]) !== []) {
            return null;
        }

        $key = (string) array_key_first($lists);
        $items = $lists[$key]['items'] ?? [];

        return ['key' => $key, 'item' => isset($items['$ref']) ? $this->refName($items['$ref']) : null, 'paged' => isset($properties['totalPages'])];
    }

    /**
     * @param  array<string, mixed>  $spec
     * @param  array<string, mixed>  $override
     * @return array{path: array<string, array<string, mixed>>, query: array<string, array<string, mixed>>, body: ?array<string, mixed>, multipart: array<string, array<string, mixed>>}
     */
    private function parameters(array $spec, array $override, string $path): array
    {
        $parameters = ['path' => [], 'query' => [], 'body' => null, 'multipart' => []];

        foreach ($spec['parameters'] ?? [] as $parameter) {
            if (in_array($parameter['name'], self::IGNORED_PARAMETERS, true)) {
                continue;
            }

            $name = $this->phpName(lcfirst((string) preg_replace('/[^A-Za-z0-9]/', '', $parameter['name'])));

            match ($parameter['in']) {
                'path' => $parameters['path'][$parameter['name']] = ['php' => $name, 'type' => ($parameter['type'] ?? 'string') === 'integer' ? 'int' : 'string'],
                'query' => $parameters['query'][$parameter['name']] = ['php' => $name, 'type' => $this->queryType($parameter), 'required' => ($parameter['required'] ?? false) || in_array($parameter['name'], $override['required'] ?? [], true)],
                'body' => $parameters['body'] = $this->body($parameter),
                'formData' => $parameters['multipart'][$parameter['name']] = ['php' => $name, 'file' => ($parameter['type'] ?? null) === 'file', 'model' => $this->multipartModel($override['multipart'][$parameter['name']] ?? (isset($parameter['schema']['$ref']) ? $this->refName($parameter['schema']['$ref']) : null)), 'required' => $parameter['required'] ?? false],
                default => null,
            };
        }

        uksort($parameters['path'], fn (string $a, string $b) => strpos($path, '{'.$a.'}') <=> strpos($path, '{'.$b.'}'));

        $otherNames = array_column([...$parameters['path'], ...$parameters['query']], 'php');

        if (isset($parameters['body']['specName']) && in_array($parameters['body']['php'], $otherNames, true)) {
            $parameters['body']['php'] = $parameters['body']['specName'];
        }

        return $parameters;
    }

    /**
     * @param  array<string, mixed>  $parameter
     */
    private function queryType(array $parameter): string
    {
        return match (true) {
            $parameter['name'] === '$filter' => 'string|\Stringable|null',
            ($parameter['format'] ?? null) === 'date-time' => '\DateTimeInterface|string|null',
            default => match ($parameter['type'] ?? 'string') {
                'integer' => '?int',
                'number' => '?float',
                'boolean' => '?bool',
                'array' => '?array',
                default => '?string',
            },
        };
    }

    /**
     * @param  array<string, mixed>  $parameter
     * @return array<string, mixed>
     */
    /**
     * A parameter's PHP name, with "Value" added where it would clash with a property of the request classes.
     */
    private function phpName(string $name): string
    {
        $this->requestProperties ??= collect([
            'spkm\IsamsApi\Requests\IsamsRequest',
            'Saloon\Traits\Body\HasJsonBody',
            'Saloon\Traits\Body\HasMultipartBody',
            'Saloon\Traits\Body\HasStringBody',
        ])->flatMap(fn (string $class) => array_map(fn ($property) => $property->getName(), (new ReflectionClass($class))->getProperties()))->unique()->values()->all();

        return in_array($name, $this->requestProperties, true) ? $name.'Value' : $name;
    }

    /**
     * A body parameter's name, from its model: $contract for a ContractForCreate, $listItem for a GlobalListItem.
     */
    private function modelParameterName(string $modelClass): string
    {
        return $this->phpName(lcfirst((string) preg_replace(['/^(Global|Private)(?=[A-Z])/', '/(ForCreate|ForUpdate|ForPatch|Command)$/'], '', class_basename($modelClass))));
    }

    private function body(array $parameter): array
    {
        $schema = $parameter['schema'] ?? [];
        $name = $this->phpName(lcfirst((string) preg_replace(['/^public(?=[A-Z])/', '/[^A-Za-z0-9]/'], '', $parameter['name'])));
        $reference = isset($schema['$ref']) ? $this->refName($schema['$ref']) : null;

        return match (true) {
            $reference !== null && str_starts_with($reference, 'Marvin.JsonPatch') => ['php' => 'patch', 'kind' => 'patch', 'list' => false, 'required' => true],
            $reference !== null && ! $this->isEmptyModel($reference) => ['php' => $this->modelParameterName($this->queueModel($reference)), 'specName' => $name, 'kind' => 'model', 'model' => $this->models[$reference], 'list' => false, 'required' => true],
            ($schema['type'] ?? null) === 'array' && isset($schema['items']['$ref']) => ['php' => Str::plural($this->modelParameterName($this->queueModel($this->refName($schema['items']['$ref'])))), 'specName' => $name, 'kind' => 'models', 'model' => $this->models[$this->refName($schema['items']['$ref'])], 'list' => true, 'required' => true],
            ($schema['type'] ?? null) === 'string' => ['php' => $name, 'kind' => 'string', 'list' => false, 'required' => true],
            default => ['php' => $name, 'kind' => 'array', 'list' => ($schema['type'] ?? null) === 'array', 'required' => true],
        };
    }

    /**
     * @param  array<string, mixed>  $operation
     */
    private function emitRequest(array $operation): void
    {
        [$namespace, $file] = $this->file($operation['namespace']);
        $namespace->addUse('spkm\IsamsApi\Requests\IsamsRequest');
        $class = $namespace->addClass(class_basename($operation['class']))->setExtends('spkm\IsamsApi\Requests\IsamsRequest');
        $spec = $operation['spec'];
        $parameters = $operation['parameters'];
        $response = $operation['response'];

        $class->addComment(trim(($spec['summary'] ?? '')."\n\n".strtoupper($operation['method']).' '.$operation['path']));

        if ($operation['beta']) {
            $namespace->addUse('spkm\IsamsApi\Attributes\Beta');
            $class->addAttribute('spkm\IsamsApi\Attributes\Beta');
        }

        $namespace->addUse('Saloon\Enums\Method');
        $class->addProperty('method', new Literal('Method::'.strtoupper($operation['method'])))->setProtected()->setType('Saloon\Enums\Method');
        $class->addProperty('responseShape', new Literal('self::'.strtoupper($response['shape'])))->setProtected()->setType('string');

        if ($response['model'] !== null) {
            $namespace->addUse($response['model']);
            $class->addProperty('dto', new Literal(class_basename($response['model']).'::class'))->setProtected()->setType('?string');
        }

        if ($response['resultKey'] !== '') {
            $class->addProperty('resultKey', $response['resultKey'])->setPublic()->setType('string');
        }

        if ($operation['paginatable']) {
            $namespace->addUse('Saloon\PaginationPlugin\Contracts\Paginatable');
            $class->addImplement('Saloon\PaginationPlugin\Contracts\Paginatable');
        }

        if ($operation['cacheable']) {
            $class->addProperty('cacheable', true)->setProtected()->setType('bool');
        }

        if (! $operation['safe']) {
            $class->addProperty('safe', false)->setProtected()->setType('bool');
        }

        if ($operation['apiVersion']) {
            $class->addProperty('apiVersion', $operation['apiVersion'])->setProtected()->setType('?string');
        }

        $constructor = $class->addMethod('__construct');
        $this->addParameters($constructor, $parameters, $namespace, true);

        if ($constructor->getParameters() === []) {
            $class->removeMethod('__construct');
        }

        $endpoint = "'".preg_replace_callback('/\{(\w+)\}/', fn (array $match) => "'.rawurlencode((string) \$this->".$parameters['path'][$match[1]]['php'].").'", $operation['path'])."'";
        $class->addMethod('resolveEndpoint')->setReturnType('string')->setBody('return '.str_replace(".''", '', $endpoint).';');

        if ($parameters['query'] !== []) {
            $this->addQuery($class, $parameters['query']);
        }

        if ($parameters['body'] !== null) {
            $this->addBody($class, $namespace, $parameters['body']);
        } elseif ($parameters['multipart'] !== []) {
            $this->addMultipart($class, $namespace, $parameters['multipart']);
        }

        $this->files[$this->pathFor($operation['class'])] = $this->print($file);
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    private function addParameters(Method $method, array $parameters, PhpNamespace $namespace, bool $promote): void
    {
        $add = fn (string $name) => $promote ? $method->addPromotedParameter($name)->setProtected() : $method->addParameter($name);

        foreach ($parameters['path'] as $parameter) {
            $add($parameter['php'])->setType($parameter['type']);
        }

        if ($parameters['body'] !== null) {
            $body = $parameters['body'];
            $type = match ($body['kind']) {
                'patch' => 'spkm\IsamsApi\Support\JsonPatch|array',
                'model' => $body['model'].'|array',
                'string' => 'string',
                default => 'array',
            };

            if ($body['kind'] === 'patch') {
                $namespace->addUse('spkm\IsamsApi\Support\JsonPatch');
            } elseif ($body['kind'] === 'model') {
                $namespace->addUse($body['model']);
            }

            $add($body['php'])->setType($type);
        }

        foreach ($parameters['multipart'] as $part) {
            $type = $part['file'] ? 'Saloon\Data\MultipartValue' : ($part['model'] ? $part['model'].'|array' : 'array');
            $namespace->addUse($part['file'] ? 'Saloon\Data\MultipartValue' : ($part['model'] ?? 'Saloon\Data\MultipartValue'));
            $parameter = $add($part['php'])->setType($part['required'] ? $type : ($part['file'] ? '?'.$type : $type.'|null'));

            if (! $part['required']) {
                $parameter->setDefaultValue(null);
            }
        }

        if ($parameters['body'] !== null && $parameters['body']['kind'] !== 'string') {
            $body = $parameters['body'];
            $method->addComment('@param  '.match ($body['kind']) {
                'patch' => '\\spkm\\IsamsApi\\Support\\JsonPatch|list<array<string, mixed>>',
                'model' => '\\'.$body['model'].'|array<string, mixed>',
                'models' => 'list<\\'.$body['model'].'|array<string, mixed>>',
                default => 'array<mixed>',
            }.'  $'.$body['php']);
        }

        foreach ($parameters['multipart'] as $part) {
            if (! $part['file']) {
                $method->addComment('@param  '.($part['model'] ? '\\'.$part['model'].'|' : '').'array<string, mixed>'.($part['required'] ? '' : '|null').'  $'.$part['php']);
            }
        }

        $query = $parameters['query'];
        uasort($query, fn (array $a, array $b) => $b['required'] <=> $a['required']);

        foreach ($query as $parameter) {
            $type = $parameter['required'] ? ltrim(str_replace('|null', '', $parameter['type']), '?') : $parameter['type'];
            $added = $add($parameter['php'])->setType($type);

            if (str_contains($type, 'array')) {
                $method->addComment('@param  array<mixed>'.($parameter['required'] ? '' : '|null').'  $'.$parameter['php']);
            }

            if (! $parameter['required']) {
                $added->setDefaultValue(null);
            }
        }
    }

    /**
     * @param  array<string, array<string, mixed>>  $query
     */
    private function addQuery(ClassType $class, array $query): void
    {
        $lines = [];
        $anyOptional = false;

        foreach ($query as $name => $parameter) {
            $value = '$this->'.$parameter['php'];
            $orNull = $parameter['required'] ? '' : "$value === null ? null : ";
            $anyOptional = $anyOptional || ! $parameter['required'];
            $lines[] = '    '.var_export($name, true).' => '.match (true) {
                str_contains($parameter['type'], 'bool') => $orNull."($value ? 'true' : 'false')",
                str_contains($parameter['type'], 'Stringable') => $orNull."(string) $value",
                str_contains($parameter['type'], 'DateTimeInterface') => "$value instanceof \\DateTimeInterface ? {$value}->format('Y-m-d\\TH:i:s') : $value",
                default => $value,
            }.',';
        }

        $array = "[\n".implode("\n", $lines)."\n]";
        $class->addMethod('defaultQuery')->setProtected()->setReturnType('array')
            ->addComment('@return array<string, mixed>')
            ->setBody($anyOptional ? "return array_filter($array, fn (mixed \$value) => \$value !== null);" : "return $array;");
    }

    /**
     * @param  array<string, mixed>  $body
     */
    private function addBody(ClassType $class, PhpNamespace $namespace, array $body): void
    {
        $namespace->addUse('Saloon\Contracts\Body\HasBody');
        $class->addImplement('Saloon\Contracts\Body\HasBody');
        $value = '$this->'.$body['php'];

        if ($body['kind'] === 'string') {
            $namespace->addUse('Saloon\Traits\Body\HasStringBody');
            $class->addTrait('Saloon\Traits\Body\HasStringBody');
            $class->addMethod('defaultHeaders')->setProtected()->setReturnType('array')->addComment('@return array<string, string>')
                ->setBody("return ['Content-Type' => 'application/json'];");
            $class->addMethod('defaultBody')->setProtected()->setReturnType('string')->setBody("return (string) json_encode($value);");

            return;
        }

        $namespace->addUse('Saloon\Traits\Body\HasJsonBody');
        $class->addTrait('Saloon\Traits\Body\HasJsonBody');
        $namespace->addUse('spkm\IsamsApi\Data\Data');

        $code = match ($body['kind']) {
            'patch' => "return $value instanceof JsonPatch ? {$value}->toArray() : $value;",
            'model' => "return $value instanceof Data ? {$value}->toArray() : $value;",
            'models' => "return array_map(fn (mixed \$item) => \$item instanceof Data ? \$item->toArray() : \$item, $value);",
            default => "return $value;",
        };

        $class->addMethod('defaultBody')->setProtected()->setReturnType('array')->addComment('@return array<mixed>')->setBody($code);
    }

    /**
     * @param  array<string, array<string, mixed>>  $parts
     */
    private function addMultipart(ClassType $class, PhpNamespace $namespace, array $parts): void
    {
        $namespace->addUse('Saloon\Contracts\Body\HasBody');
        $namespace->addUse('Saloon\Traits\Body\HasMultipartBody');
        $namespace->addUse('Saloon\Data\MultipartValue');
        $namespace->addUse('spkm\IsamsApi\Data\Data');
        $class->addImplement('Saloon\Contracts\Body\HasBody');
        $class->addTrait('Saloon\Traits\Body\HasMultipartBody');

        $required = [];
        $optional = [];

        foreach ($parts as $name => $part) {
            $value = '$this->'.$part['php'];
            $code = $part['file'] ? $value : "new MultipartValue('$name', (string) json_encode($value instanceof Data ? {$value}->toArray() : $value))";

            if ($part['required']) {
                $required[] = $code;
            } else {
                $optional[] = "if ($value !== null) {\n    \$parts[] = $code;\n}\n";
            }
        }

        $class->addMethod('defaultBody')->setProtected()->setReturnType('array')->addComment('@return list<MultipartValue>')
            ->setBody($optional === []
                ? 'return ['.implode(', ', $required).'];'
                : '$parts = ['.implode(', ', $required)."];\n\n".implode("\n", $optional)."\nreturn \$parts;");
    }

    private function multipartModel(?string $definition): ?string
    {
        return $definition === null || $this->isEmptyModel($definition) ? null : $this->queueModel($definition);
    }

    private function isEmptyModel(string $definition): bool
    {
        $schema = $this->spec['definitions'][$definition] ?? [];

        return ($schema['properties'] ?? []) === [] && ! isset($schema['additionalProperties']);
    }

    private function queueModel(string $definition): string
    {
        if (! isset($this->models[$definition])) {
            $class = $this->modelClass($definition);
            $taken = array_search($class, $this->models, true);

            if ($taken !== false) {
                throw new RuntimeException("$definition and $taken would both be $class; add a \"models\" override for one of them.");
            }

            $this->models[$definition] = $class;
            $this->modelQueue[] = $definition;
        }

        return $this->models[$definition];
    }

    private function modelClass(string $definition): string
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
        $name = $this->overrides['models'][$definition] ?? $name;

        $module = $segments[1] ?? 'Common';
        $area = $this->overrides['modules'][$module] ?? $this->studly($module);

        return 'spkm\IsamsApi\Data\\'.$area.'\\'.$name.self::MODEL_KINDS[$kind];
    }

    private function emitModel(string $definition): void
    {
        $modelClass = $this->models[$definition];
        $spec = $this->spec['definitions'][$definition] ?? ['properties' => []];
        $isPayload = ! str_ends_with($modelClass, 'Command') && preg_match('/For(Create|Update|Patch)$/', $modelClass) === 1;
        $required = $spec['required'] ?? [];

        [$namespace, $file] = $this->file(Str::beforeLast($modelClass, '\\'));
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

        $this->files[$this->pathFor($modelClass)] = $this->print($file);
    }

    /**
     * @param  array<string, mixed>  $property
     * @return array{string, mixed, ?string, ?string}
     */
    private function propertyType(array $property, PhpNamespace $namespace, bool $isPayload, bool $isRequired): array
    {
        $nullable = $isRequired ? '' : '?';

        if (isset($property['$ref'])) {
            $reference = $this->refName($property['$ref']);
            $wrapper = $this->wrapper($reference);

            if ($wrapper === null && ! $this->isEmptyModel($reference)) {
                $model = $this->queueModel($reference);
                $namespace->addUse($model);

                return [$nullable.$model, null, null, null];
            }

            $property = $wrapper === null
                ? ['type' => 'object']
                : ['type' => 'array', 'items' => $wrapper['item'] ? ['$ref' => '#/definitions/'.$wrapper['item']] : []];
        }

        if (($property['type'] ?? null) === 'array') {
            if (isset($property['items']['$ref']) && $this->wrapper($this->refName($property['items']['$ref'])) === null && ! $this->isEmptyModel($this->refName($property['items']['$ref']))) {
                $item = $this->queueModel($this->refName($property['items']['$ref']));
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
        $this->enumClasses ??= $this->nameEnums();
        $enumClass = $this->enumClasses[$this->enumKey($modelClass, $property, $values)];
        $namespace->addUse($enumClass);
        $class->addMethod($property.'Enum')->setReturnType('?'.$enumClass)
            ->setBody('return '.class_basename($enumClass).'::tryFrom((string) $this->'.$property.');');

        if (isset($this->files[$this->pathFor($enumClass)])) {
            return;
        }

        [$enumNamespace, $file] = $this->file(Str::beforeLast($enumClass, '\\'));
        $enum = $enumNamespace->addEnum(class_basename($enumClass))->setType('string');
        $used = [];

        foreach ($values as $index => $value) {
            $case = $this->studly((string) $value) ?: 'Value'.$index;
            $case = ctype_digit($case[0]) ? 'Value'.$case : $case;
            $case = isset($used[$case]) ? $case.$index : $case;
            $used[$case] = true;
            $enum->addCase($case, (string) $value);
        }

        $this->files[$this->pathFor($enumClass)] = $this->print($file);
    }

    /**
     * One enum per module, property and set of values, shared by every model with that property: named after its model
     * (or what its models' names end with in common) and the property, without repeating a word.
     *
     * @return array<string, string> enum key => enum class
     */
    private function nameEnums(): array
    {
        $groups = [];

        foreach ($this->spec['definitions'] as $definition => $schema) {
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
            $words = array_map(fn (string $model) => $this->words($model), $models);
            $shared = $words[0];

            foreach ($words as $modelWords) {
                while ($shared !== [] && array_slice($modelWords, -count($shared)) !== $shared) {
                    array_shift($shared);
                }
            }

            $classes[$key] = $namespace.'\\Enums\\'.$this->joinWords(count($models) === 1 ? $words[0] : $shared, $this->words(ucfirst($property)));
        }

        $renames = $this->overrides['enums'] ?? [];

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

        return $classes;
    }

    /**
     * @param  list<string>  $values
     */
    private function enumKey(string $modelClass, string $property, array $values): string
    {
        return Str::beforeLast($modelClass, '\\').'|'.$property.'|'.implode(',', $values);
    }

    /**
     * @return list<string>
     */
    private function words(string $name): array
    {
        preg_match_all('/[A-Z]+(?![a-z])|[A-Z][a-z0-9]*|[a-z0-9]+/', $name, $matches);

        return $matches[0];
    }

    /**
     * The two names joined, without repeating the words the first ends with and the second starts with.
     *
     * @param  list<string>  $first
     * @param  list<string>  $second
     */
    private function joinWords(array $first, array $second): string
    {
        for ($overlap = min(count($first), count($second)); $overlap > 0; $overlap--) {
            if (array_slice($first, -$overlap) === array_slice($second, 0, $overlap)) {
                return implode('', [...$first, ...array_slice($second, $overlap)]);
            }
        }

        return implode('', [...$first, ...$second]);
    }

    /**
     * @param  array<string, mixed>  $operation
     */
    private function addResourceMethod(array $operation): void
    {
        $resource = $this->resourceFor($operation['namespace']);
        $requestClass = ltrim($operation['class'], '\\');
        $name = lcfirst((string) preg_replace('/Request$/', '', class_basename($requestClass)));
        $method = (new Method($name))->setPublic();

        if ($operation['source'] === 'generated') {
            $this->addParameters($method, $operation['parameters'], new PhpNamespace('Unused'), false);
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
            'short' => $operation['override']['method'] ?? $this->actionName($requestClass, $operation['namespace'], $operation['tag'], $operation['path']),
        ];

        for ($child = $resource; ($parent = $this->parentResource($child)) !== null; $child = $parent) {
            $this->resources[$parent] ??= [];
        }
    }

    /**
     * The resource class for a request namespace: Requests\A\B\C is Resources\A\B\CResource.
     */
    private function resourceFor(string $requestNamespace): string
    {
        return 'spkm\IsamsApi\Resources\\'.Str::after($requestNamespace, 'spkm\IsamsApi\Requests\\').'Resource';
    }

    private function parentResource(string $resource): ?string
    {
        $path = Str::after(Str::beforeLast($resource, 'Resource'), 'spkm\IsamsApi\Resources\\');

        return str_contains($path, '\\') ? 'spkm\IsamsApi\Resources\\'.Str::beforeLast($path, '\\').'Resource' : null;
    }

    /**
     * A resource method's name: the request's action without the noun its resource already names. A list is all(), a
     * single item get(), and other actions keep their words: archive(), moveToAlumni(), getCurrent().
     */
    private function actionName(string $requestClass, string $requestNamespace, string $tag, string $path): string
    {
        $area = $this->tagParts($tag)['area'];
        $segments = array_values(array_filter(explode('\\', Str::after($requestNamespace, 'spkm\IsamsApi\Requests\\')), fn (string $segment) => preg_match('/^V\d+$/', $segment) !== 1));
        $areaNouns = $this->overrides['areaNouns'][$area] ?? [];
        $nouns = array_map($this->singularWord(...), [
            ...array_merge(...array_map($this->words(...), $segments)),
            ...$areaNouns,
            ...$this->overrides['noiseWords'][$area] ?? [],
            ...explode(' ', $area),
            ...(preg_match_all('#/([A-Za-z]+)/\{#', $path, $collections) ? $collections[1] : []),
        ]);
        $words = $this->words(Str::beforeLast(class_basename($requestClass), 'Request'));
        $verb = (string) array_shift($words);
        $isNoun = fn (string $word) => in_array($this->singularWord($word), $nouns, true);
        $heads = array_map($this->singularWord(...), [(string) last($this->words((string) end($segments))), ...(count($segments) === 1 ? $areaNouns : [])]);
        $head = collect($heads)->first(fn (string $candidate) => in_array($candidate, array_map($this->singularWord(...), $words), true)) ?? $heads[0];

        $end = 0;
        while ($end < count($words) && $isNoun($words[$end])) {
            $end++;
        }
        $start = 0;

        if (! in_array($head, array_map($this->singularWord(...), array_slice($words, 0, $end)), true)) {
            $last = null;
            foreach ($words as $index => $word) {
                if ($this->singularWord($word) === $head) {
                    $last = $index;
                }
            }

            if ($last === null) {
                return lcfirst($verb.implode('', $words));
            }

            [$start, $end] = [$last, $last + 1];
            while ($start > 0 && $isNoun($words[$start - 1])) {
                $start--;
            }
        }

        $noun = array_slice($words, $start, $end - $start);
        $rest = [...array_slice($words, 0, $start), ...array_slice($words, $end)];

        $byId = array_search('By', $rest, true);

        if ($byId !== false && end($rest) === 'Id') {
            $rest = array_slice($rest, 0, $byId);
        }

        if ($start > 0 && $end === count($words)) {
            while ($rest !== [] && in_array(end($rest), ['To', 'From', 'For', 'By', 'In', 'Of', 'With', 'On', 'At'], true)) {
                array_pop($rest);
            }
        }

        $isPlural = $noun !== [] && ! in_array(end($noun), $this->overrides['uncountable'] ?? [], true) && Str::singular((string) end($noun)) !== end($noun);

        return match (true) {
            $verb === 'Get' && ($rest === [] || $rest === ['All']) => $isPlural || $rest === ['All'] ? 'all' : 'get',
            $rest === [] && $isPlural && in_array($verb, ['Create', 'Update', 'Patch', 'Delete'], true) => lcfirst($verb).'Many',
            default => lcfirst($verb.implode('', $rest)),
        };
    }

    /**
     * @param  array{contents: list<string>, section: string}  $batchEndpoints
     */
    private function emitResources(array $batchEndpoints): void
    {
        ksort($this->resources);
        $areas = [];
        $children = [];
        $calls = [];

        foreach (array_keys($this->resources) as $resource) {
            $parent = $this->parentResource($resource);
            $parent === null ? $areas[] = $resource : $children[$parent][lcfirst((string) preg_replace('/Resource$/', '', class_basename($resource)))] = $resource;
        }

        foreach ($this->resources as $resource => $methods) {
            [$namespace, $file] = $this->file(Str::beforeLast($resource, '\\'));
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

            $this->files[$this->pathFor($resource)] = $this->print($file);
        }

        [$namespace, $file] = $this->file('spkm\IsamsApi\Resources');
        $trait = $namespace->addTrait('HasResources');

        foreach ($areas as $area) {
            $namespace->addUse($area);
            $trait->addMethod(lcfirst((string) preg_replace('/Resource$/', '', class_basename($area))))
                ->setReturnType($area)
                ->setBody('return new '.class_basename($area).'($this);');
        }

        $this->files[$this->pathFor('spkm\IsamsApi\Resources\HasResources')] = $this->print($file);
        $this->emitFacade($areas);
        $this->emitEndpoints($areas, $children, $calls, $batchEndpoints);
    }

    /**
     * ENDPOINTS.md: every REST resource call, written as a caller writes it, with what it returns, one table per area;
     * then the Batch API's methods, from the batch generator.
     *
     * @param  list<string>  $areas
     * @param  array<string, array<string, string>>  $children
     * @param  array<string, list<Method>>  $calls
     * @param  array{contents: list<string>, section: string}  $batchEndpoints
     */
    private function emitEndpoints(array $areas, array $children, array $calls, array $batchEndpoints): void
    {
        $chains = [];
        $walk = function (string $resource, string $chain) use (&$walk, &$chains, $children): void {
            $chains[$resource] = $chain;

            foreach ($children[$resource] ?? [] as $name => $child) {
                $walk($child, "$chain->$name()");
            }
        };

        $contents = [];
        $sections = [];
        $total = 0;

        foreach ($areas as $area) {
            $name = lcfirst((string) preg_replace('/Resource$/', '', class_basename($area)));
            $title = Str::headline($name);
            $chains = [];
            $walk($area, "Isams::$name()");
            $rows = [];

            foreach ($chains as $resource => $chain) {
                foreach ($calls[$resource] ?? [] as $method) {
                    $call = $chain.'->'.$method->getName().'('.implode(', ', array_map($this->endpointParameter(...), $method->getParameters())).')';
                    $rows[] = '| `'.str_replace('|', '\\|', $call).'` | '.str_replace('|', '\\|', $this->endpointReturn($method)).' |';
                }
            }

            sort($rows);
            $total += count($rows);
            $contents[] = '  - ['.$title.'](#'.Str::slug($title).') ('.count($rows).')';
            $sections[] = "### $title\n\n| Call | Returns |\n|---|---|\n".implode("\n", $rows)."\n";
        }

        $this->files['ENDPOINTS.md'] = implode("\n", [
            '# Endpoints',
            '',
            '<!-- Generated by bin/generate from the iSAMS API spec and generator/batch/nodes.php: edit those, not this file. -->',
            '',
            'Everything the package can ask iSAMS for, as you write it: the REST API\'s calls, then the Batch API\'s methods.',
            '',
            '- [REST API](#rest-api) ('.number_format($total).' calls)',
            ...$contents,
            ...$batchEndpoints['contents'],
            '',
            '## REST API',
            '',
            'Each call is a resource method and returns what iSAMS sent back. Lists come back as a `Collection` of models, and',
            'lists iSAMS sends in pages as a `LazyCollection` that fetches each page as you loop. Writes iSAMS answers without a',
            'body return `true` (`bool`), as Eloquent\'s `update()` and `delete()` do. A failure never returns `false`: it',
            'throws an `IsamsApiException`. See [Two ways to call iSAMS](README.md#two-ways-to-call-isams) and',
            '[Errors](README.md#errors). Each call\'s docblock names the request it sends, for `Isams::send()`.',
            '',
            implode("\n", $sections),
            ...($batchEndpoints['section'] === '' ? [] : [$batchEndpoints['section']]),
        ]);
    }

    private function endpointParameter(Parameter $parameter): string
    {
        $type = implode('|', array_map(fn (string $part) => (str_starts_with($part, '?') ? '?' : '').class_basename(ltrim($part, '?')), explode('|', (string) $parameter->getType())));
        $type = $parameter->isNullable() && $type !== '' && ! str_contains($type, '|') && ! str_contains($type, 'null') && ! str_starts_with($type, '?') && $type !== 'mixed' ? "?$type" : $type;
        $default = $parameter->hasDefaultValue() ? ' = '.($parameter->getDefaultValue() === null ? 'null' : var_export($parameter->getDefaultValue(), true)) : '';

        return ($type === '' ? '' : "$type ").'$'.$parameter->getName().$default;
    }

    private function endpointReturn(Method $method): string
    {
        $type = (string) $method->getReturnType();
        preg_match('/@return\\s+\\S*Collection<int, \\\\?([\\w\\\\]+)>/', $method->getComment() ?? '', $item);

        return match (true) {
            $type === 'mixed' => 'iSAMS\'s JSON, decoded (the spec gives no model)',
            isset($item[1]) => '`'.class_basename($type).'<'.class_basename($item[1]).'>`',
            default => '`'.($method->isReturnNullable() || str_starts_with($type, '?') ? '?' : '').class_basename(ltrim($type, '?')).'`',
        };
    }

    /**
     * The Isams facade, with a hint for each area and for the service's and connector's own methods, so IDEs can
     * autocomplete Isams::.
     *
     * @param  list<string>  $areas
     */
    private function emitFacade(array $areas): void
    {
        [$namespace, $file] = $this->file('spkm\IsamsApi\Facades');
        $namespace->addUse('Illuminate\Support\Facades\Facade');
        $class = $namespace->addClass('Isams')->setExtends('Illuminate\Support\Facades\Facade');

        foreach ($areas as $area) {
            $class->addComment('@method static \\'.$area.' '.lcfirst((string) preg_replace('/Resource$/', '', class_basename($area))).'()');
        }

        $methods = [
            ...array_filter((new ReflectionClass('spkm\IsamsApi\IsamsService'))->getMethods(ReflectionMethod::IS_PUBLIC), fn (ReflectionMethod $method) => ! str_starts_with($method->getName(), '__')),
            ...array_map(fn (string $name) => new ReflectionMethod('spkm\IsamsApi\IsamsConnector', $name), ['send', 'paginate', 'paginateEndpoint', 'get', 'post', 'put', 'patch', 'delete']),
        ];

        foreach ($methods as $method) {
            $class->addComment('@method static '.$this->hintReturnType($method).' '.$method->getName().'('.implode(', ', array_map($this->hintParameter(...), $method->getParameters())).')');
        }

        $class->addMethod('getFacadeAccessor')->setProtected()->setStatic()->setReturnType('string')->setBody("return 'isams';");
        $this->files[$this->pathFor('spkm\IsamsApi\Facades\Isams')] = $this->print($file);
    }

    private function hintReturnType(ReflectionMethod $method): string
    {
        return preg_match('/@return\\s+(\\S+)/', (string) $method->getDocComment(), $matches)
            ? $this->qualify($matches[1], $method)
            : $this->hintType($method->getReturnType());
    }

    private function hintParameter(ReflectionParameter $parameter): string
    {
        $method = $parameter->getDeclaringFunction();
        $documented = $method instanceof ReflectionMethod && preg_match('/@param\\s+(.+?)\\s+\\$'.$parameter->getName().'\\b/', (string) $method->getDocComment(), $matches)
            ? $this->qualify($matches[1], $method)
            : null;
        $type = $documented ?? ($parameter->getType() === null ? null : $this->hintType($parameter->getType()));
        $default = '';

        if ($parameter->isDefaultValueAvailable()) {
            $value = $parameter->getDefaultValue();
            $default = ' = '.match (true) {
                $value === null => 'null',
                $value === [] => '[]',
                is_array($value) => '['.implode(', ', array_map(fn (mixed $item) => var_export($item, true), $value)).']',
                default => var_export($value, true),
            };
        }

        return ($type === null ? '' : $type.' ').'$'.$parameter->getName().$default;
    }

    private function hintType(?ReflectionType $type): string
    {
        $types = $type instanceof ReflectionUnionType ? $type->getTypes() : ($type === null ? [] : [$type]);
        $names = array_map(fn (ReflectionNamedType $named) => $named->isBuiltin() ? $named->getName() : '\\'.$named->getName(), array_filter($types, fn ($named) => $named instanceof ReflectionNamedType));
        $hint = implode('|', $names) ?: 'mixed';

        return $type?->allowsNull() && ! in_array('null', $names, true) && $hint !== 'mixed' ? '?'.$hint : $hint;
    }

    /**
     * A docblock type with its class names made absolute: they name a class in the declaring class's namespace, an
     * imported global class, or a full name.
     */
    private function qualify(string $type, ReflectionMethod $method): string
    {
        return implode('|', array_map(function (string $part) use ($method) {
            $name = ltrim($part, '\\');
            $local = $method->getDeclaringClass()->getNamespaceName().'\\'.$name;

            return match (true) {
                str_contains($part, '<') || ctype_lower($part[0]) => $part,
                class_exists($local) || interface_exists($local) => '\\'.$local,
                default => '\\'.$name,
            };
        }, explode('|', $type)));
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

    /**
     * @return array{PhpNamespace, PhpFile}
     */
    private function file(string $namespace): array
    {
        $file = new PhpFile;
        $file->addComment(self::MARKER);

        return [$file->addNamespace($namespace), $file];
    }

    private function print(PhpFile $file): string
    {
        return (new PsrPrinter)->printFile($file);
    }

    private function pathFor(string $class): string
    {
        return 'generated/'.str_replace('\\', '/', Str::after($class, 'spkm\IsamsApi\\')).'.php';
    }

    private function refName(string $reference): string
    {
        return Str::after($reference, '#/definitions/');
    }

    private function studly(string $value): string
    {
        return Str::studly((string) preg_replace('/[^A-Za-z0-9]+/', ' ', $value));
    }
}
