<?php

use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\IsamsPaginator;
use spkm\IsamsApi\Requests\AdhocRequest;
use spkm\IsamsApi\Requests\ConfigurablePaginatedRequest;
use spkm\IsamsApi\Support\JsonPatch;
use spkm\IsamsApi\Tests\Fixtures\ExampleAddress;
use spkm\IsamsApi\Tests\Fixtures\ExamplePagedRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleStudent;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('pages through a request as models with dtos()', function () {
    FakeIsams::respondWith([ExamplePagedRequest::class => MockResponse::make(['students' => [['id' => 1], ['id' => 2]], 'totalPages' => 1])]);

    $paginator = FakeIsams::connector()->paginate(new ExamplePagedRequest);

    expect($paginator)->toBeInstanceOf(IsamsPaginator::class)
        ->and($paginator->dtos()->all())->toEqual([new ExampleStudent(id: 1), new ExampleStudent(id: 2)]);
});

it('refuses dtos() for a request that has no model, such as an endpoint named by its path', function () {
    FakeIsams::respondWith();

    FakeIsams::connector()->paginateEndpoint('/api/students/customgroups', 'customGroups')->dtos();
})->throws(LogicException::class, 'ConfigurablePaginatedRequest has no model; use collect() for its items as arrays.');

it('sends requests to another configured school through a named connection', function () {
    config(['isams-api.connections.prep' => ['client_id' => 'prep-client', 'client_secret' => 'prep-secret', 'base_url' => 'https://prep.example.test']]);
    $isams = FakeIsams::respondWith([AdhocRequest::class => MockResponse::make(['terms' => []])]);

    $response = Isams::connection('prep')->get('/api/school/terms');

    expect($response->getPendingRequest()->getUrl())->toBe('https://prep.example.test/api/school/terms')
        ->and(FakeIsams::received($isams, GetClientCredentialsTokenRequest::class)->body()->get('client_id'))->toBe('prep-client')
        ->and(Isams::connection('prep'))->toBe(Isams::connection('prep'));
});

it('refuses a connection that is not configured', function () {
    Isams::connection('missing');
})->throws(InvalidArgumentException::class, 'No iSAMS connection named "missing" is configured in isams-api.connections.');

it('sends an ad-hoc GET to any iSAMS path with a query', function () {
    $isams = FakeIsams::respondWith([AdhocRequest::class => MockResponse::make(['customGroups' => []])]);

    FakeIsams::connector()->get('/api/students/customgroups', ['$filter' => "Name eq 'Choir'"]);

    $sent = FakeIsams::received($isams, AdhocRequest::class);
    expect($sent->getMethod())->toBe(Method::GET)
        ->and($sent->getUrl())->toBe('https://isams.example.test/api/students/customgroups')
        ->and($sent->query()->all())->toBe(['$filter' => "Name eq 'Choir'"]);
});

it('sends ad-hoc writes with JSON bodies built from arrays, models or JSON Patch', function (string $method, mixed $body, array $json) {
    $isams = FakeIsams::respondWith([AdhocRequest::class => MockResponse::make(status: 200)]);

    FakeIsams::connector()->{$method}('/api/students/100001', $body);

    $sent = FakeIsams::received($isams, AdhocRequest::class)->createPsrRequest();
    expect($sent->getMethod())->toBe(strtoupper($method))
        ->and($sent->getHeaderLine('Content-Type'))->toBe('application/json')
        ->and(json_decode((string) $sent->getBody(), true))->toBe($json);
})->with([
    'POST an array' => ['post', ['forename' => 'Alex'], ['forename' => 'Alex']],
    'PUT a model' => ['put', new ExampleAddress('Exampleton'), ['town' => 'Exampleton']],
    'PATCH a JSON Patch' => ['patch', JsonPatch::make()->replace('/forename', 'Alex'), [['op' => 'replace', 'path' => '/forename', 'value' => 'Alex']]],
]);

it('sends an ad-hoc DELETE', function () {
    $isams = FakeIsams::respondWith([AdhocRequest::class => MockResponse::make(status: 200)]);

    FakeIsams::connector()->delete('/api/students/100001/customgroups/3');

    expect(FakeIsams::received($isams, AdhocRequest::class)->getMethod())->toBe(Method::DELETE);
});

it('pages through any iSAMS path, collecting the items under the result key', function () {
    $isams = FakeIsams::respondWith([ConfigurablePaginatedRequest::class => MockResponse::make(['customGroups' => [['id' => 3]], 'totalPages' => 1])]);

    $groups = FakeIsams::connector()->paginateEndpoint('/api/students/customgroups', 'customGroups', ['$filter' => "Name eq 'Choir'"])->collect()->all();

    expect($groups)->toBe([['id' => 3]])
        ->and(FakeIsams::queriesReceived($isams, ConfigurablePaginatedRequest::class)[0])->toMatchArray(['$filter' => "Name eq 'Choir'", 'page' => 1]);
});

it('names the missing setting when a named connection is only partly configured', function () {
    config(['isams-api.connections.prep' => ['client_id' => 'prep-client', 'base_url' => 'https://prep.example.test']]);

    Isams::connection('prep');
})->throws(InvalidArgumentException::class, 'The iSAMS connection "prep" needs a client_secret.');
