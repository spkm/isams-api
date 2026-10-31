<?php

use spkm\IsamsApi\Generator\Writer;

beforeEach(function () {
    $this->root = sys_get_temp_dir().'/isams-api-writer-'.getmypid().'-'.uniqid();
    mkdir($this->root.'/generated/Requests/Teaching', recursive: true);
    mkdir($this->root.'/generator');
    file_put_contents($this->root.'/generated/Requests/Teaching/GetSubjectsRequest.php', 'subjects');
    file_put_contents($this->root.'/generated/Requests/Teaching/GetSetsRequest.php', 'sets');
    file_put_contents($this->root.'/generator/manifest.json', '{}');
    file_put_contents($this->root.'/generator/overrides.php', 'not managed');
});

afterEach(function () {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->root, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $entry) {
        $entry->isDir() ? rmdir($entry->getPathname()) : unlink($entry->getPathname());
    }

    rmdir($this->root);
});

it('manages everything in generated/, the manifest and ENDPOINTS.md, but nothing else the generator reads', function () {
    file_put_contents($this->root.'/ENDPOINTS.md', '# Endpoints');

    expect((new Writer($this->root))->managed())->toBe([
        'ENDPOINTS.md',
        'generated/Requests/Teaching/GetSetsRequest.php',
        'generated/Requests/Teaching/GetSubjectsRequest.php',
        'generator/manifest.json',
    ]);
});

it('plans the files whose contents changed or that are new, and the managed files no longer built, without writing', function () {
    $plan = (new Writer($this->root))->plan([
        'generated/Requests/Teaching/GetSubjectsRequest.php' => 'subjects, changed',
        'generated/Requests/Teaching/GetSetRequest.php' => 'set',
        'generator/manifest.json' => '{}',
    ]);

    expect($plan)->toBe([
        'changed' => ['generated/Requests/Teaching/GetSetRequest.php', 'generated/Requests/Teaching/GetSubjectsRequest.php'],
        'removed' => ['generated/Requests/Teaching/GetSetsRequest.php'],
    ])->and(file_get_contents($this->root.'/generated/Requests/Teaching/GetSubjectsRequest.php'))->toBe('subjects')
        ->and(is_file($this->root.'/generated/Requests/Teaching/GetSetsRequest.php'))->toBeTrue();
});

it('writes what changed, in new directories where needed, and deletes what is no longer built', function () {
    (new Writer($this->root))->write([
        'generated/Requests/Teaching/GetSubjectsRequest.php' => 'subjects, changed',
        'generated/Data/Teaching/Subject.php' => 'subject',
        'generator/manifest.json' => '{}',
    ]);

    expect(file_get_contents($this->root.'/generated/Requests/Teaching/GetSubjectsRequest.php'))->toBe('subjects, changed')
        ->and(file_get_contents($this->root.'/generated/Data/Teaching/Subject.php'))->toBe('subject')
        ->and(is_file($this->root.'/generated/Requests/Teaching/GetSetsRequest.php'))->toBeFalse()
        ->and(file_get_contents($this->root.'/generator/overrides.php'))->toBe('not managed');
});

it('leaves a file whose contents are unchanged untouched', function () {
    $path = $this->root.'/generated/Requests/Teaching/GetSubjectsRequest.php';
    touch($path, 1_000_000);

    (new Writer($this->root))->write([
        'generated/Requests/Teaching/GetSubjectsRequest.php' => 'subjects',
        'generated/Requests/Teaching/GetSetsRequest.php' => 'sets',
        'generator/manifest.json' => '{}',
    ]);
    clearstatcache();

    expect(filemtime($path))->toBe(1_000_000);
});

it('removes the directories that deleting files leaves empty', function () {
    (new Writer($this->root))->write(['generated/Data/Teaching/Subject.php' => 'subject', 'generator/manifest.json' => '{}']);

    expect(is_dir($this->root.'/generated/Requests'))->toBeFalse()
        ->and(is_dir($this->root.'/generated/Data/Teaching'))->toBeTrue();
});

it('builds generated/ from nothing', function () {
    foreach (['GetSubjectsRequest', 'GetSetsRequest'] as $name) {
        unlink($this->root."/generated/Requests/Teaching/$name.php");
    }
    rmdir($this->root.'/generated/Requests/Teaching');
    rmdir($this->root.'/generated/Requests');
    rmdir($this->root.'/generated');

    $plan = (new Writer($this->root))->write(['generated/Data/Teaching/Subject.php' => 'subject', 'generator/manifest.json' => '{}']);

    expect($plan)->toBe(['changed' => ['generated/Data/Teaching/Subject.php'], 'removed' => []])
        ->and(file_get_contents($this->root.'/generated/Data/Teaching/Subject.php'))->toBe('subject');
});
