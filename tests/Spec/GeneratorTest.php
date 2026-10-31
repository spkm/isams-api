<?php

use spkm\IsamsApi\Generator\ApiSpec;
use spkm\IsamsApi\Generator\BatchGenerator;
use spkm\IsamsApi\Generator\Corrections;
use spkm\IsamsApi\Generator\Generator;
use spkm\IsamsApi\IsamsConnector;

/**
 * Checks the package's overrides, changed by $change, as the generator does before it builds anything.
 */
function checkOverrides(Closure $change): void
{
    static $spec = null;
    $package = dirname(__DIR__, 2);
    $spec ??= new ApiSpec($package);

    (new Corrections($change(require $package.'/generator/overrides.php')))->validateAgainst($spec);
}

/**
 * Runs the generator over the real spec with the package's overrides, changed by $change.
 */
function generateWithOverrides(Closure $change): void
{
    $package = dirname(__DIR__, 2);

    (new Generator($package, new Corrections($change(require $package.'/generator/overrides.php'))))->build();
}

/**
 * Runs the Batch API generator over the real node lists with the package's overrides, changed by $change.
 */
function generateBatchWithOverrides(Closure $change): void
{
    $package = dirname(__DIR__, 2);

    (new BatchGenerator($package, new Corrections($change(require $package.'/generator/overrides.php'))))->build();
}

it('refuses an override for an operation the spec does not have, so a fix is never lost when iSAMS renames one', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAllRenamed'] = ['class' => 'GetSubjectsRequest'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAllRenamed: no such operation in the spec');
});

it('refuses a key it does not read', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['areaNoun'] = ['Students' => ['Student']];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'areaNoun: no such key');
});

it('refuses an override setting it does not know', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['cachable' => true];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.cachable: no such setting');
});

it('refuses a setting of the wrong shape', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['cacheable' => 'yes'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.cacheable: must be true or false');
});

it('refuses a response shape requests do not have, which would generate a request that cannot load', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['response' => 'files'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.response: must be a response shape (one, list, created, file, raw, none)');
});

it('refuses settings on a skipped operation, which nothing would read', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['skip' => 'Not needed.', 'cacheable' => true];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll: a skipped operation has no other settings');
});

it('refuses settings a hand-written request does not read', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Students_GetBySchoolidExpand']['cacheable'] = true;

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Students_GetBySchoolidExpand.cacheable: a hand-written request does not read it');
});

it('refuses an override on an area it does not generate', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['areas'] = array_values(array_diff($overrides['areas'], ['Gradebooks']));

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Gradebooks_GetAll: area Gradebooks is not generated; add it to areas or remove the override');
});

it('refuses a model rename for a definition the spec does not have', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['models']['iSAMS.Nowhere.Get.Thing'] = 'Thing';

        return $overrides;
    }))->toThrow(RuntimeException::class, 'models.iSAMS.Nowhere.Get.Thing: no such definition in the spec');
});

it('refuses an area the spec does not have', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['areaNouns']['Timetables'] = ['Timetable'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'areaNouns.Timetables: no such area in the spec');
});

it('refuses a hand-written request class that does not exist', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Students_GetBySchoolidExpand'] = ['handwritten' => 'spkm\IsamsApi\Requests\Students\GetPupilRequest'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Students_GetBySchoolidExpand.handwritten: no class spkm\IsamsApi\Requests\Students\GetPupilRequest');
});

it('refuses a hand-written class that is not a request', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Students_GetBySchoolidExpand'] = ['handwritten' => IsamsConnector::class];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Students_GetBySchoolidExpand.handwritten: spkm\IsamsApi\IsamsConnector is not an IsamsRequest');
});

it('refuses a required query parameter the operation does not have', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['required' => ['changeDate']];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.required: no query parameter changeDate');
});

it('refuses a response correction naming a definition the spec does not have', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['response' => ['list' => 'iSAMS.Nowhere.Get.Thing', 'key' => 'things']];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.response: no such definition iSAMS.Nowhere.Get.Thing');
});

it('refuses a property correction for a definition the spec does not have', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['properties']['iSAMS.Nowhere.Get.Thing'] = ['deleted' => ['type' => 'boolean']];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'properties.iSAMS.Nowhere.Get.Thing: no such definition in the spec');
});

it('reports every problem at once, not only the first', function () {
    expect(fn () => checkOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAllRenamed'] = ['class' => 'GetSubjectsRequest'];
        $overrides['models']['iSAMS.Nowhere.Get.Thing'] = 'Thing';
        $overrides['areaNouns']['Timetables'] = ['Timetable'];

        return $overrides;
    }))->toThrow(fn (RuntimeException $exception) => expect($exception->getMessage())
        ->toContain('operations.Subjects_GetAllRenamed: no such operation in the spec')
        ->toContain('models.iSAMS.Nowhere.Get.Thing: no such definition in the spec')
        ->toContain('areaNouns.Timetables: no such area in the spec'));
});

it('refuses an enum rename for an enum the generator does not make', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['enums']['Gradebooks\Kind'] = 'MembershipType';

        return $overrides;
    }))->toThrow(RuntimeException::class, 'enums.Gradebooks\Kind: no such enum');
});

it('accepts the package\'s own overrides', function () {
    expect(fn () => generateWithOverrides(fn (array $overrides) => $overrides))->not->toThrow(RuntimeException::class);
});

it('documents every override key and setting in generator/README.md', function () {
    $readme = (string) file_get_contents(dirname(__DIR__, 2).'/generator/README.md');

    foreach ([...array_keys(Corrections::KEYS), ...array_keys(Corrections::SETTINGS)] as $key) {
        expect($readme)->toContain("`$key`");
    }
});

it('accepts the package\'s own Batch API overrides', function () {
    expect(fn () => generateBatchWithOverrides(fn (array $overrides) => $overrides))->not->toThrow(RuntimeException::class);
});

it('refuses a Batch model name for records no two root nodes share', function () {
    expect(fn () => generateBatchWithOverrides(function (array $overrides) {
        $overrides['batchModels']['CalendarManager']['Category'] = 'EventCategory';

        return $overrides;
    }))->toThrow(RuntimeException::class, "batchModels.CalendarManager.Category: no Category records have the same shape under several of CalendarManager's root nodes");
});

it('refuses a Batch model name for a module the node lists do not have', function () {
    expect(fn () => generateBatchWithOverrides(function (array $overrides) {
        $overrides['batchModels']['NowhereManager']['Thing'] = 'Thing';

        return $overrides;
    }))->toThrow(RuntimeException::class, 'batchModels.NowhereManager.Thing');
});

it('refuses Batch model names that would give two shapes of record one class', function () {
    expect(fn () => generateBatchWithOverrides(function (array $overrides) {
        $overrides['batchModels']['TimetableManager']['Teacher'] = 'Timetable';

        return $overrides;
    }))->toThrow(RuntimeException::class, 'would all be spkm\\IsamsApi\\Data\\Batch\\TimetableManager\\Timetable');
});
