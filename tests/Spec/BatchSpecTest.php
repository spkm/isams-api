<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\Batch\BatchData;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\Batch\BatchResponse;
use spkm\IsamsApi\Batch\HasBatchGroups;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/**
 * @return array<string, array{string, string, array<string, mixed>}> label => [module, root, facts]
 */
function batchRoots(): array
{
    $facts = require dirname(__DIR__, 2).'/generator/batch/nodes.php';
    $roots = [];

    foreach ($facts['modules'] as $module => $moduleRoots) {
        foreach ($moduleRoots as $root => $rootFacts) {
            $roots["$module/$root"] = [$module, $root, $rootFacts];
        }
    }

    return $roots;
}

it('has a model for every root node whose records the node lists describe, and an entry for every method', function () {
    $facts = require dirname(__DIR__, 2).'/generator/batch/nodes.php';

    foreach ($facts['modules'] as $module => $roots) {
        foreach ($roots as $root => $rootFacts) {
            expect(BatchMap::ROOTS[$module][$root]['entity'])->toBe($rootFacts['entity']);

            if (isset($rootFacts['nodes'][$rootFacts['entity']])) {
                expect(BatchMap::ROOTS[$module][$root]['model'])->not->toBeNull();
            }

            foreach ($rootFacts['methods'] as $method) {
                expect(BatchMap::METHODS[$method])->toBe([$module, $root]);
            }
        }
    }
})->group('spec');

it('reads every documented field of a root node\'s records into its model', function (string $module, string $root, array $facts) {
    $node = $facts['nodes'][$facts['entity']] ?? null;

    if ($node === null) {
        expect(BatchMap::ROOTS[$module][$root]['model'])->toBeNull();

        return;
    }

    $samples = ['Integer' => '7', 'float' => '1.5', 'Bit' => '1', 'Boolean' => 'True', 'DateTime' => '2026-01-02T03:04:05', 'Date' => '2026-01-02', 'smalldatetime' => '2026-01-02T03:04:00'];
    $record = [];
    $expected = [];

    foreach (['attributes' => '@', 'children' => ''] as $kind => $prefix) {
        foreach ($node[$kind] as $name => $type) {
            if (! str_starts_with($type, '<') && ! array_key_exists(BatchData::propertyName($name), $expected)) {
                $record[$prefix.$name] = $samples[$type] ?? 'Sample text';
                $expected[BatchData::propertyName($name)] = true;
            }
        }
    }

    $model = (new BatchResponse(['iSAMS' => [$module => [$root => [$facts['entity'] => [$record]]]]]))->models($module, $root)->first();

    expect($model)->toBeInstanceOf(BatchMap::ROOTS[$module][$root]['model']);

    foreach (array_keys($expected) as $property) {
        expect($model->{$property})->not->toBeNull("$property was not read");
    }
})->with(batchRoots())->group('spec');

/**
 * Every generated batch call, keyed by the Batch API method it runs, found by calling each one with made-up arguments.
 *
 * @return array<string, array{call: string, returned: mixed}>
 */
function batchCalls(): array
{
    $sent = [];
    FakeIsams::respondWith([BatchRequest::class => function (PendingRequest $request) use (&$sent) {
        preg_match('#<Method>(\w+)</Method>#', (string) $request->body(), $method);
        $sent[] = $method[1];
        [$module, $root] = BatchMap::METHODS[$method[1]];

        return MockResponse::make(['iSAMS' => [$module => [$root => [BatchMap::ROOTS[$module][$root]['entity'] => [['@Id' => '1']]]]]]);
    }]);
    $batch = new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL);
    $calls = [];

    foreach ((new ReflectionClass(HasBatchGroups::class))->getMethods() as $groupAccessor) {
        $group = $batch->{$groupAccessor->getName()}();

        foreach ((new ReflectionClass($group))->getMethods(ReflectionMethod::IS_PUBLIC) as $call) {
            if ($call->getDeclaringClass()->getName() !== $group::class) {
                continue;
            }

            $arguments = array_map(fn (ReflectionParameter $parameter) => match ((string) $parameter->getType()) {
                'DateTimeInterface', '?DateTimeInterface' => CarbonImmutable::parse('2026-11-01'),
                'array', '?array' => [1],
                'bool', '?bool' => true,
                default => 1,
            }, $call->getParameters());
            $returned = $call->invokeArgs($group, $arguments);
            $calls[(string) end($sent)] = ['call' => $groupAccessor->getName().'()->'.$call->getName().'()', 'returned' => $returned];
        }
    }

    return $calls;
}

it('gives every Batch API method one call that runs only it and returns its root node\'s models, lazily', function () {
    $calls = batchCalls();

    expect(array_keys($calls))->toEqualCanonicalizing(array_keys(BatchMap::METHODS));

    foreach ($calls as $method => ['returned' => $returned]) {
        [$module, $root] = BatchMap::METHODS[$method];

        expect($returned)->toBeInstanceOf(LazyCollection::class)
            ->and($returned->first())->toBeInstanceOf(BatchMap::ROOTS[$module][$root]['model']);
    }
})->group('spec');

it('names each batch call after its iSAMS method, without Get, All or a repeat of the group\'s name', function (string $method, string $call) {
    expect(batchCalls()[$method]['call'])->toBe($call);
})->with([
    ['Pupil_GetCurrentPupils', 'pupil()->currentPupils()'],
    ['Cover_GetAllAbsenceReasons', 'cover()->absenceReasons()'],
    ['School_GetSchoolTerms', 'school()->terms()'],
    ['Teaching_GetTeachingSets', 'teaching()->sets()'],
    ['SENManager_GetSENLessons', 'senManager()->senLessons()'],
    ['ExternalExams_GetUABGroups', 'externalExams()->uabGroups()'],
    ['OtherSchools_BoardingTypes', 'otherSchools()->boardingTypes()'],
    ['OtherSchools_GetOtherSchools', 'otherSchools()->all()'],
    ['DailyBulletin_GetDailyBulletins', 'dailyBulletin()->all()'],
    ['DailyBulletin_GetTodaysDailyBulletins', 'dailyBulletin()->today()'],
    ['News_GetActiveNews', 'news()->active()'],
    ['Timetable_GetPublishedTimetables', 'timetable()->published()'],
])->group('spec');
