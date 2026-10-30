<?php

use Saloon\Config;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\IsamsPaginator;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Tests\Helpers\Sandbox;
use spkm\IsamsApi\Tests\Helpers\Spec;

/*
|--------------------------------------------------------------------------
| Sandbox checks
|--------------------------------------------------------------------------
|
| Real requests to your own iSAMS sandbox, run only with `vendor/bin/pest --testsuite=Sandbox` and the ISAMS_SANDBOX_*
| variables set (see the README). Reads only, unless ISAMS_SANDBOX_ALLOW_WRITES is true. They print the field names
| that differ from the package's models, never any values.
|
*/

beforeEach(function () {
    Config::allowStrayRequests();
});

afterEach(function () {
    Config::preventStrayRequests();
});

/**
 * @return array<string, array{string}> label => [request class]
 */
function sandboxListRequests(): array
{
    return collect(Spec::manifest()['operations'])
        ->filter(fn (array $operation) => $operation['source'] === 'generated' && $operation['method'] === 'GET' && ! str_contains($operation['path'], '{'))
        ->filter(function (array $operation) {
            $parameters = (new ReflectionClass($operation['class']))->getConstructor()?->getParameters() ?? [];

            return collect($parameters)->every(fn (ReflectionParameter $parameter) => $parameter->isDefaultValueAvailable()) && (new $operation['class'])->isSafe();
        })
        ->mapWithKeys(fn (array $operation) => [class_basename($operation['class']) => [$operation['class']]])
        ->sortKeys()
        ->all();
}

it('reads each list iSAMS offers without arguments into the package\'s models', function (string $class) {
    if (! Sandbox::configured()) {
        $this->markTestSkipped('Set ISAMS_SANDBOX_BASE_URL, ISAMS_SANDBOX_CLIENT_ID and ISAMS_SANDBOX_CLIENT_SECRET to run the sandbox checks.');
    }

    /** @var IsamsRequest $request */
    $request = new $class;
    $response = Sandbox::connector()->send($request);

    if (in_array($response->status(), [401, 403, 404], true)) {
        $this->markTestSkipped(class_basename($class).': iSAMS answered '.$response->status().' (not enabled for these credentials).');
    }

    expect($response->successful())->toBeTrue(class_basename($class).': iSAMS answered '.$response->status());

    $result = $response->dto();
    $model = $request->dtoClass();

    if ($model !== null) {
        $records = $request->resultKey === '' ? (array) $response->json() : (array) $response->json($request->resultKey);
        $records = array_is_list($records) ? $records : [$records];
        Sandbox::report(class_basename($class), Sandbox::shapeDifferences(array_values(array_filter($records, 'is_array')), $model));
    }

    expect($result)->not->toBeNull();
})->with(sandboxListRequests());

it('numbers pages from 1 and reports the total number of pages', function () {
    if (! Sandbox::configured()) {
        $this->markTestSkipped('Set the ISAMS_SANDBOX_* variables to run the sandbox checks.');
    }

    $pages = Sandbox::connector()->paginate(new GetStudentsRequest);
    $pages->setPerPageLimit(1);
    $first = $pages->getIterator()->current();

    expect($pages)->toBeInstanceOf(IsamsPaginator::class)
        ->and($first->json('page'))->toBe(1)
        ->and($first->json('totalPages'))->toBeInt();
});

it('reads every root node a batch key returns into the package\'s models', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set ISAMS_SANDBOX_BASE_URL, ISAMS_SANDBOX_BATCH_KEY and ISAMS_SANDBOX_BATCH_SECRET to check a batch key.');
    }

    $batch = Sandbox::batchConnector()->send(new BatchRequest)->dto();

    foreach ($batch->toArray()['iSAMS'] ?? [] as $module => $roots) {
        foreach (is_array($roots) ? array_keys($roots) : [] as $root) {
            $model = BatchMap::ROOTS[$module][$root]['model'] ?? null;
            $records = $batch->get($module, (string) $root)->filter(fn (mixed $record) => is_array($record))->values()->all();

            $model === null
                ? fwrite(STDERR, "\n$module/$root: the package has no model for this root node")
                : Sandbox::report("$module/$root", Sandbox::shapeDifferences($records, $model));

            expect($batch->models($module, (string) $root))->toHaveCount(count($records));
        }
    }
});
