<?php

use spkm\IsamsApi\Generator\Generator;

/**
 * Runs the generator over the real spec with the real overrides, changed by $change.
 */
function generateWithOverrides(Closure $change): void
{
    $package = dirname(__DIR__, 2);
    $root = sys_get_temp_dir().'/isams-api-generator-'.getmypid().'-'.uniqid();
    mkdir($root.'/generator', recursive: true);
    symlink($package.'/generator/spec', $root.'/generator/spec');
    $overrides = $change(require $package.'/generator/overrides.php');
    file_put_contents($root.'/generator/overrides.php', '<?php return '.var_export($overrides, true).';');

    try {
        (new Generator($root))->build();
    } finally {
        unlink($root.'/generator/overrides.php');
        unlink($root.'/generator/spec');
        rmdir($root.'/generator');
        rmdir($root);
    }
}

it('refuses an override for an operation the spec does not have, so a fix is never lost when iSAMS renames one', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAllRenamed'] = ['class' => 'GetSubjectsRequest'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAllRenamed: no such operation in the spec');
});

it('refuses an override setting it does not know', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['cachable' => true];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.cachable: no such setting');
});

it('refuses a model rename for a definition the spec does not have', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['models']['iSAMS.Nowhere.Get.Thing'] = 'Thing';

        return $overrides;
    }))->toThrow(RuntimeException::class, 'models.iSAMS.Nowhere.Get.Thing: no such definition in the spec');
});

it('refuses an area the spec does not have', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['areaNouns']['Timetables'] = ['Timetable'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'areaNouns.Timetables: no such area in the spec');
});

it('refuses a hand-written request class that does not exist', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['operations']['Students_GetBySchoolidExpand'] = ['handwritten' => 'spkm\IsamsApi\Requests\Students\GetPupilRequest'];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Students_GetBySchoolidExpand.handwritten: no class spkm\IsamsApi\Requests\Students\GetPupilRequest');
});

it('accepts the package\'s own overrides', function () {
    expect(fn () => generateWithOverrides(fn (array $overrides) => $overrides))->not->toThrow(RuntimeException::class);
});

it('refuses an enum rename for an enum the generator does not make', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['enums']['Gradebooks\Kind'] = 'MembershipType';

        return $overrides;
    }))->toThrow(RuntimeException::class, 'enums.Gradebooks\Kind: no such enum');
});

it('refuses a required query parameter the operation does not have', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['required' => ['changeDate']];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.required: no query parameter changeDate');
});

it('refuses a response correction naming a definition the spec does not have', function () {
    expect(fn () => generateWithOverrides(function (array $overrides) {
        $overrides['operations']['Subjects_GetAll'] = ['response' => ['list' => 'iSAMS.Nowhere.Get.Thing', 'key' => 'things']];

        return $overrides;
    }))->toThrow(RuntimeException::class, 'operations.Subjects_GetAll.response: no such definition iSAMS.Nowhere.Get.Thing');
});
