<?php

namespace spkm\IsamsApi\Generator;

use Illuminate\Support\Str;
use ReflectionClass;
use RuntimeException;
use spkm\IsamsApi\Generator\Naming\RequestNaming;

/**
 * The spec's operations as the generator sees them: each skipped, hand-written, pending or generated, and for a
 * generated one the request's namespace and class, response, parameters and flags, with the models they need
 * registered.
 *
 * @phpstan-type Response array{shape: string, model: ?string, resultKey: string, paged: bool}
 * @phpstan-type Parameters array{path: array<string, array<string, mixed>>, query: array<string, array<string, mixed>>, body: ?array<string, mixed>, multipart: array<string, array<string, mixed>>}
 * @phpstan-type SpecOperation array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool, override: array<string, mixed>, tag: string}
 * @phpstan-type SkippedOperation array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool, override: array<string, mixed>, tag: string, source: 'skipped', reason: string}
 * @phpstan-type PendingOperation array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool, override: array<string, mixed>, tag: string, source: 'pending'}
 * @phpstan-type HandwrittenOperation array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool, override: array<string, mixed>, tag: string, source: 'handwritten', class: class-string, namespace: string, response: Response}
 * @phpstan-type GeneratedOperation array{id: string, method: string, path: string, spec: array<string, mixed>, apiVersion: ?string, superseded: bool, override: array<string, mixed>, tag: string, source: 'generated', namespace: string, class: string, response: Response, parameters: Parameters, beta: bool, paginatable: bool, cacheable: bool, safe: bool}
 * @phpstan-type Operation SkippedOperation|PendingOperation|HandwrittenOperation|GeneratedOperation
 */
final class Operations
{
    /** @var list<string>|null property names a generated request inherits */
    private ?array $requestProperties = null;

    public function __construct(
        private readonly ApiSpec $spec,
        private readonly Corrections $corrections,
        private readonly RequestNaming $requestNaming,
        private readonly ModelRegistry $models,
    ) {}

    /**
     * Every operation, with the generated requests' names told apart where two would clash.
     *
     * @return list<Operation>
     */
    public function all(): array
    {
        return $this->resolveCollisions($this->operations());
    }

    /**
     * @return list<Operation>
     */
    private function operations(): array
    {
        $operations = [];

        foreach ($this->spec->operations() as $operation) {
            $spec = $operation['spec'];
            $override = $this->corrections->operation($operation['id']);
            $tag = $spec['tags'][0] ?? 'Other';
            $operation = [...$operation, 'override' => $override, 'tag' => $tag];

            if (isset($override['skip'])) {
                $operations[] = [...$operation, 'source' => 'skipped', 'reason' => $override['skip']];
            } elseif (isset($override['handwritten'])) {
                $operations[] = [...$operation, 'source' => 'handwritten', 'class' => $override['handwritten'], 'namespace' => $this->requestNaming->namespaceFor($tag), 'response' => $this->response($operation['spec'], $override)];
            } elseif (! in_array($this->requestNaming->tagParts($tag)['area'], $this->corrections->areas(), true)) {
                $operations[] = [...$operation, 'source' => 'pending'];
            } else {
                $operations[] = $this->describe($operation);
            }
        }

        return $operations;
    }

    /**
     * @param  SpecOperation  $operation
     * @return GeneratedOperation
     */
    private function describe(array $operation): array
    {
        $spec = $operation['spec'];
        $override = $operation['override'];
        $response = $this->response($spec, $override);
        $parameters = $this->parameters($spec, $override, $operation['path']);
        $namespace = $this->requestNaming->namespaceFor($operation['tag']).($operation['superseded'] ? '\\V1' : '');
        $name = $override['class'] ?? $this->requestNaming->className($operation, $response, $parameters);

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
     * @param  list<Operation>  $operations
     * @return list<Operation>
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
                $operations[$index]['class'] = $this->requestNaming->disambiguate($class, $operations[$index]['path']);
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
     * @return Response
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
            isset($schema['$ref']) => $this->responseForDefinition(ApiSpec::refName($schema['$ref'])),
            ($schema['type'] ?? null) === 'array' => [...$none, 'shape' => 'list', 'model' => isset($schema['items']['$ref']) ? ApiSpec::refName($schema['items']['$ref']) : null],
            default => [...$none, 'shape' => 'raw'],
        };

        if ($response['model'] !== null) {
            $response['model'] = $this->spec->isEmptyModel($response['model']) ? null : $this->models->register($response['model']);
        }

        return $response;
    }

    /**
     * @return Response
     */
    private function responseForDefinition(string $definition): array
    {
        $wrapper = $this->spec->wrapper($definition);

        if ($wrapper === null) {
            return ['shape' => 'one', 'model' => $definition, 'resultKey' => '', 'paged' => false];
        }

        return ['shape' => 'list', 'model' => $wrapper['item'], 'resultKey' => $wrapper['key'], 'paged' => $wrapper['paged']];
    }

    /**
     * @param  array<string, mixed>  $spec
     * @param  array<string, mixed>  $override
     * @return Parameters
     */
    private function parameters(array $spec, array $override, string $path): array
    {
        $parameters = ['path' => [], 'query' => [], 'body' => null, 'multipart' => []];

        foreach ($spec['parameters'] ?? [] as $parameter) {
            if (in_array($parameter['name'], ApiSpec::IGNORED_PARAMETERS, true)) {
                continue;
            }

            $name = $this->phpName(lcfirst((string) preg_replace('/[^A-Za-z0-9]/', '', $parameter['name'])));

            match ($parameter['in']) {
                'path' => $parameters['path'][$parameter['name']] = ['php' => $name, 'type' => ($parameter['type'] ?? 'string') === 'integer' ? 'int' : 'string'],
                'query' => $parameters['query'][$parameter['name']] = ['php' => $name, 'type' => $this->queryType($parameter), 'required' => ($parameter['required'] ?? false) || in_array($parameter['name'], $override['required'] ?? [], true)],
                'body' => $parameters['body'] = $this->body($parameter),
                'formData' => $parameters['multipart'][$parameter['name']] = ['php' => $name, 'file' => ($parameter['type'] ?? null) === 'file', 'model' => $this->multipartModel($override['multipart'][$parameter['name']] ?? (isset($parameter['schema']['$ref']) ? ApiSpec::refName($parameter['schema']['$ref']) : null)), 'required' => $parameter['required'] ?? false],
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

    /**
     * @param  array<string, mixed>  $parameter
     * @return array<string, mixed>
     */
    private function body(array $parameter): array
    {
        $schema = $parameter['schema'] ?? [];
        $name = $this->phpName(lcfirst((string) preg_replace(['/^public(?=[A-Z])/', '/[^A-Za-z0-9]/'], '', $parameter['name'])));
        $reference = isset($schema['$ref']) ? ApiSpec::refName($schema['$ref']) : null;

        return match (true) {
            $reference !== null && str_starts_with($reference, 'Marvin.JsonPatch') => ['php' => 'patch', 'kind' => 'patch', 'list' => false, 'required' => true],
            $reference !== null && ! $this->spec->isEmptyModel($reference) => ['php' => $this->modelParameterName($this->models->register($reference)), 'specName' => $name, 'kind' => 'model', 'model' => $this->models->classFor($reference), 'list' => false, 'required' => true],
            ($schema['type'] ?? null) === 'array' && isset($schema['items']['$ref']) => ['php' => Str::plural($this->modelParameterName($this->models->register(ApiSpec::refName($schema['items']['$ref'])))), 'specName' => $name, 'kind' => 'models', 'model' => $this->models->classFor(ApiSpec::refName($schema['items']['$ref'])), 'list' => true, 'required' => true],
            ($schema['type'] ?? null) === 'string' => ['php' => $name, 'kind' => 'string', 'list' => false, 'required' => true],
            default => ['php' => $name, 'kind' => 'array', 'list' => ($schema['type'] ?? null) === 'array', 'required' => true],
        };
    }

    private function multipartModel(?string $definition): ?string
    {
        return $definition === null || $this->spec->isEmptyModel($definition) ? null : $this->models->register($definition);
    }
}
