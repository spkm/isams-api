<?php

use spkm\IsamsApi\Batch\BatchData;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Batch\BatchResponse;

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
