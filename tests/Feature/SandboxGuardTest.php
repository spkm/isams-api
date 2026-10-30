<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Requests\AdhocRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Workflows\ProcessWorkflowsRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleStudent;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;
use spkm\IsamsApi\Tests\Helpers\Sandbox;

beforeEach(function () {
    putenv('ISAMS_SANDBOX_BASE_URL='.FakeIsams::BASE_URL);
    putenv('ISAMS_SANDBOX_CLIENT_ID=sandbox-id');
    putenv('ISAMS_SANDBOX_CLIENT_SECRET=sandbox-secret');
    FakeIsams::respondWith([AdhocRequest::class => MockResponse::make(['ok' => true]), ProcessWorkflowsRequest::class => MockResponse::make()]);
});

afterEach(function () {
    foreach (['ISAMS_SANDBOX_BASE_URL', 'ISAMS_SANDBOX_CLIENT_ID', 'ISAMS_SANDBOX_CLIENT_SECRET', 'ISAMS_SANDBOX_ALLOW_WRITES'] as $name) {
        putenv($name);
    }
});

it('lets the sandbox checks read', function () {
    expect(Sandbox::connector()->get('/api/students')->json())->toBe(['ok' => true]);
});

it('refuses to write to the sandbox unless ISAMS_SANDBOX_ALLOW_WRITES is true', function () {
    expect(fn () => Sandbox::connector()->post('/api/students', ['forename' => 'Alex']))
        ->toThrow(LogicException::class, 'The sandbox checks only read unless ISAMS_SANDBOX_ALLOW_WRITES is true; refused POST AdhocRequest.');

    putenv('ISAMS_SANDBOX_ALLOW_WRITES=true');

    expect(Sandbox::connector()->post('/api/students', ['forename' => 'Alex'])->json())->toBe(['ok' => true]);
});

it('never sends a GET that makes iSAMS do something, even with writes allowed', function () {
    putenv('ISAMS_SANDBOX_ALLOW_WRITES=true');

    expect(fn () => Sandbox::connector()->send(new ProcessWorkflowsRequest))
        ->toThrow(LogicException::class, 'The sandbox checks never send ProcessWorkflowsRequest: it makes iSAMS do something.');
});

it('compares the field names iSAMS sent with a model\'s fields', function () {
    $differences = Sandbox::shapeDifferences([['id' => 1, 'forename' => 'Alex', 'nickname' => 'Al']], ExampleStudent::class);

    expect($differences['unknown'])->toBe(['nickname'])
        ->and($differences['missing'])->toBe(['boarder', 'fee', 'dob', 'home', 'addresses', 'languages', 'extra']);
});

it('reports no missing fields when iSAMS sent no records', function () {
    expect(Sandbox::shapeDifferences([], ExampleStudent::class))->toBe(['unknown' => [], 'missing' => []]);
});
