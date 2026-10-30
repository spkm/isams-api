<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;
use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\AdhocRequest;
use spkm\IsamsApi\Requests\ConfigurablePaginatedRequest;
use spkm\IsamsApi\Requests\ConfigurableRequest;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;
use spkm\IsamsApi\Tests\Helpers\Spec;

it('accounts for every operation in the iSAMS v1 spec, and each one v2 changes, exactly once', function () {
    $manifest = Spec::manifest()['operations'];

    expect(array_keys($manifest))->toEqualCanonicalizing(Spec::operationIds())
        ->and(collect($manifest)->pluck('source')->unique()->diff(['generated', 'handwritten', 'skipped', 'pending'])->all())->toBe([])
        ->and(collect($manifest)->where('source', 'skipped')->every(fn (array $operation) => ($operation['reason'] ?? '') !== ''))->toBeTrue();
});

it('names a class that exists for every generated and hand-written operation, and never one class twice', function () {
    $classes = collect(Spec::manifest()['operations'])->whereIn('source', ['generated', 'handwritten'])->pluck('class');

    expect($classes->every(fn (string $class) => class_exists($class)))->toBeTrue()
        ->and($classes->duplicates()->all())->toBe([]);
});

it('builds each generated request with the method, path, query names and body the spec documents', function (string $id, string $method, string $path) {
    $class = Spec::manifest()['operations'][$id]['class'];
    $arguments = Spec::arguments($class);
    $spec = Spec::operation($method, $path, $id);
    $documentedQuery = collect($spec['parameters'] ?? [])->where('in', 'query')->pluck('name')->all();
    $hasBody = collect($spec['parameters'] ?? [])->whereIn('in', ['body', 'formData'])->isNotEmpty();

    $sent = FakeIsams::send(new $class(...$arguments), [])->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe($method)
        ->and($sent->getUri()->getPath())->toBe(Spec::expectedPath($path, $arguments))
        ->and(array_diff(array_keys($sent->getUri()->getQuery() === '' ? [] : (parse_str($sent->getUri()->getQuery(), $query) ?? $query)), $documentedQuery))->toBe([])
        ->and((string) $sent->getBody() !== '')->toBe($hasBody);
})->with(Spec::generatedOperations())->group('spec');

it('turns each generated request\'s documented response into the right kind of result', function (string $id, string $method, string $path) {
    $class = Spec::manifest()['operations'][$id]['class'];
    $spec = Spec::operation($method, $path, $id);
    $correction = Spec::override($id)['response'] ?? null;
    $codes = array_filter(array_keys($spec['responses']), fn ($code) => $code >= 200 && $code < 300);
    sort($codes);
    $code = (int) ($codes[0] ?? 200);
    $schema = match (true) {
        isset($correction['definition']) => ['$ref' => '#/definitions/'.$correction['definition']],
        isset($correction['list']) => ['type' => 'array'],
        $correction === 'file' => ['type' => 'file'],
        default => $spec['responses'][$code]['schema'] ?? null,
    };
    $items = isset($correction['list']) ? [Spec::sample($correction['list'])] : null;
    $body = match (true) {
        $items !== null => $correction['key'] === '' ? $items : [$correction['key'] => $items, 'totalPages' => 1],
        $schema === null => '',
        default => Spec::value($schema),
    };
    $request = new $class(...Spec::arguments($class));

    FakeIsams::respondWith([$class => MockResponse::make(is_array($body) || $body === '' ? $body : (string) json_encode($body), $code, ['Location' => 'https://isams.example.test'.$path, 'Content-Type' => 'application/json'])]);
    $result = FakeIsams::connector()->send($request)->dto();

    match (true) {
        $code === 201 => expect($result)->toBeInstanceOf(Created::class),
        ($schema['type'] ?? null) === 'file' => expect($result)->toBeInstanceOf(File::class),
        $schema === null => expect($result)->toBeNull(),
        ($schema['type'] ?? null) === 'array' || $request->resultKey !== '' => expect($result)->toBeInstanceOf(Collection::class),
        isset($schema['$ref']) => expect($result)->toBeInstanceOf(Data::class),
        default => expect($result)->toBe($body),
    };

    expect($request instanceof Paginatable)->toBe(collect($spec['parameters'] ?? [])->contains('name', 'page') && ($correction['paged'] ?? isset(Spec::spec()['definitions'][Str::after($schema['$ref'] ?? '', '#/definitions/')]['properties']['totalPages'])));
})->with(Spec::generatedOperations())->group('spec');

it('gives each hand-written request the model the spec documents for its response', function (string $id) {
    $operation = Spec::manifest()['operations'][$id];
    $request = new $operation['class'](...Spec::arguments($operation['class']));

    expect($request)->toBeInstanceOf(IsamsRequest::class)
        ->and($request->dtoClass())->toBe($operation['model'] ?? null);
})->with(fn () => array_keys(array_filter(Spec::manifest()['operations'], fn (array $operation) => $operation['source'] === 'handwritten')))->group('spec');

it('gives each resource method the return type its request\'s response calls for (null allowed for a single record not read by id), and points it to that request', function () {
    $directory = dirname(__DIR__, 2).'/generated/Resources';
    $paths = array_column(Spec::manifest()['operations'], 'path', 'class');
    $mismatches = [];
    $checked = 0;

    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)) as $file) {
        $resource = new ReflectionClass('spkm\\IsamsApi\\Resources\\'.str_replace(['/', '.php'], ['\\', ''], substr($file->getPathname(), strlen($directory) + 1)));

        foreach ($resource->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== $resource->getName() || ! preg_match('/@see \\\\(\S+Request)/', (string) $method->getDocComment(), $see)) {
                continue;
            }

            $request = new ReflectionClass($see[1]);
            $shape = $request->getProperty('responseShape')->getDefaultValue();
            $expected = match (true) {
                $request->implementsInterface(Paginatable::class) => LazyCollection::class,
                $shape === IsamsRequest::LIST => Collection::class,
                $shape === IsamsRequest::ONE && $request->getProperty('dto')->getDefaultValue() === null => 'array',
                $shape === IsamsRequest::ONE => (str_ends_with($paths[$see[1]], '}') ? '' : '?').$request->getProperty('dto')->getDefaultValue(),
                $shape === IsamsRequest::CREATED => Created::class,
                $shape === IsamsRequest::FILE => File::class,
                $shape === IsamsRequest::RAW => 'mixed',
                default => 'bool',
            };
            $checked++;

            if ((string) $method->getReturnType() !== $expected) {
                $mismatches[] = $resource->getShortName().'::'.$method->getName().' returns '.$method->getReturnType().", not $expected";
            }
        }
    }

    $onResources = array_filter(Spec::manifest()['operations'], fn (array $operation) => in_array($operation['source'], ['generated', 'handwritten'], true));

    expect($mismatches)->toBe([])
        ->and($checked)->toBe(count($onResources));
})->group('spec');

it('builds each generated model from made-up data matching its definition and turns it back into the same data', function (string $definition, string $class) {
    $sample = Spec::sample($definition);
    $model = $class::from($sample);
    $parameters = collect((new ReflectionClass($class))->getConstructor()?->getParameters() ?? []);
    $emptyByDefault = $parameters->filter(fn (ReflectionParameter $parameter) => $parameter->isDefaultValueAvailable() && ($parameter->getDefaultValue() === [] || $parameter->getDefaultValue() instanceof Collection))->map->getName();
    $expected = collect($sample)->only($parameters->map->getName())->reject(fn (mixed $value, string $name) => $value === null || ($value === [] && $emptyByDefault->contains($name)))->all();

    $required = collect((new ReflectionClass($class))->getConstructor()?->getParameters() ?? [])->reject->isDefaultValueAvailable()->map->getName();

    expect($model->toArray())->toEqual($expected);

    $required->isEmpty()
        ? expect($class::from([]))->toBeInstanceOf($class)
        : expect(fn () => $class::from([]))->toThrow(InvalidArgumentException::class, 'needs a value for "'.$required->first().'"');
})->with(fn () => collect(Spec::manifest()['models'])->mapWithKeys(fn (string $class, string $definition) => [class_basename($class) => [$definition, $class]])->all())->group('spec');

it('deprecates every hand-written request the generator has replaced', function () {
    $current = collect(Spec::manifest()['operations'])->where('source', 'handwritten')->pluck('class')
        ->merge([IsamsRequest::class, AdhocRequest::class, ConfigurableRequest::class, ConfigurablePaginatedRequest::class]);
    $root = dirname(__DIR__, 2).'/src/Requests/';
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));

    foreach ($files as $file) {
        $class = 'spkm\\IsamsApi\\Requests\\'.str_replace(['/', '.php'], ['\\', ''], substr($file->getPathname(), strlen($root)));

        if (! $current->contains($class)) {
            $docComment = (string) (new ReflectionClass($class))->getDocComment();

            expect(str_contains($docComment, '@deprecated'))->toBeTrue("$class is neither current nor deprecated");

            if (preg_match('/@deprecated Use \\\\([\\w\\\\]+)/', $docComment, $replacement) === 1) {
                expect(class_exists($replacement[1]))->toBeTrue("$class names {$replacement[1]} as its replacement, which does not exist");
            }
        }
    }
})->group('spec');

it('lists every resource call in ENDPOINTS.md as you would write it, with what it returns, linked from the README', function () {
    $root = dirname(__DIR__, 2);
    $endpoints = (string) file_get_contents($root.'/ENDPOINTS.md');
    preg_match_all('/^\| `Isams::.+` \| .+ \|$/m', Str::before($endpoints, "\n## Batch API\n"), $calls);
    $onResources = array_filter(Spec::manifest()['operations'], fn (array $operation) => in_array($operation['source'], ['generated', 'handwritten'], true));

    expect($calls[0])->toHaveCount(count($onResources))
        ->and($endpoints)->toContain('| `Isams::teaching()->subjects()->all()` | `Collection<Subject>` |')
        ->toContain('| `Isams::teaching()->subjects()->get(int $id)` | `Subject` |')
        ->toContain('| `Isams::students()->all(mixed $expand = null, mixed $filter = null)` | `LazyCollection<Student>` |')
        ->toContain('| `Isams::teaching()->subjects()->create(SubjectForCreate\\|array $subject)` | `Created` |')
        ->toContain('| `Isams::teaching()->sets()->removeStudent(int $setId, string $schoolId)` | `bool` |')
        ->toContain('| `Isams::humanResources()->employeeContracts()->v1()->all(int $employeeId)` |')
        ->and((string) file_get_contents($root.'/README.md'))->toContain('(ENDPOINTS.md#rest-api)');
})->group('spec');

it('separates the REST calls from the Batch API calls in ENDPOINTS.md, listing a call for every batch method and each root node no method names', function () {
    $endpoints = (string) file_get_contents(dirname(__DIR__, 2).'/ENDPOINTS.md');
    $rest = Str::between($endpoints, "\n## REST API\n", "\n## Batch API\n");
    $batch = Str::after($endpoints, "\n## Batch API\n");
    $filled = array_map(fn (array $place) => implode('/', $place), BatchMap::METHODS);
    $unfilled = collect(BatchMap::ROOTS)->flatMap(fn (array $roots, string $module) => array_map(fn (string $root) => "$module/$root", array_keys($roots)))->diff($filled);
    preg_match_all('/^\| `Isams::batch\(\)->\w+\(\)->\w+\(.*\)` \| `LazyCollection<\w+>` \|$/m', $batch, $calls);
    preg_match_all('/^\| `Isams::batch\(\)->send\(new BatchRequest\)->dto\(\)->models\(.+\)` \| `Collection<\w+>` \|$/m', $batch, $unnamed);

    expect($rest)->toContain('| `Isams::teaching()->subjects()->all()` |')
        ->not->toContain('Isams::batch()')
        ->and($batch)->not->toContain('| `Isams::teaching()')
        ->toContain('| `Isams::batch()->calendar()->events(DateTimeInterface $startDate, DateTimeInterface $endDate)` | `LazyCollection<Event>` |')
        ->toContain('| `Isams::batch()->pupil()->passports(array $systemStatusesToInclude)` | `LazyCollection<Pupil>` |')
        ->toContain('| `Isams::batch()->pupil()->currentPupils()` | `LazyCollection<Pupil>` |')
        ->toContain("| `Isams::batch()->send(new BatchRequest)->dto()->models('CurriculumManager', 'Levels')` |")
        ->toContain('| `Isams::batch()->studentPhotos()` | `BatchPhotos`')
        ->and($calls[0])->toHaveCount(count(BatchMap::METHODS))
        ->and($unnamed[0])->toHaveCount($unfilled->count())
        ->and((string) file_get_contents(dirname(__DIR__, 2).'/README.md'))->toContain('(ENDPOINTS.md#batch-api)');
})->group('spec');

it('documents where iSAMS\'s API differs from its documentation, linked from the README', function () {
    $root = dirname(__DIR__, 2);

    expect(file_exists($root.'/ISAMS-API-DIFFERENCES.md'))->toBeTrue()
        ->and((string) file_get_contents($root.'/README.md'))->toContain('(ISAMS-API-DIFFERENCES.md)');
})->group('spec');
