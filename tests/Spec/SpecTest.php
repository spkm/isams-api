<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\Contracts\Paginatable;
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
        $correction === 'file' => ['type' => 'file'],
        default => $spec['responses'][$code]['schema'] ?? null,
    };
    $body = $schema === null ? '' : Spec::value($schema);
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

    expect($request instanceof Paginatable)->toBe(collect($spec['parameters'] ?? [])->contains('name', 'page') && isset(Spec::spec()['definitions'][Str::after($schema['$ref'] ?? '', '#/definitions/')]['properties']['totalPages']));
})->with(Spec::generatedOperations())->group('spec');

it('gives each hand-written request the model the spec documents for its response', function (string $id) {
    $operation = Spec::manifest()['operations'][$id];
    $request = new $operation['class'](...Spec::arguments($operation['class']));

    expect($request)->toBeInstanceOf(IsamsRequest::class)
        ->and($request->dtoClass())->toBe($operation['model'] ?? null);
})->with(fn () => array_keys(array_filter(Spec::manifest()['operations'], fn (array $operation) => $operation['source'] === 'handwritten')))->group('spec');

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
