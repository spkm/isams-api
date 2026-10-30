<?php

use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Requests\ConfigurablePaginatedRequest;
use spkm\IsamsApi\Requests\ConfigurableRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('sends a configurable request to the endpoint and with the method it was given', function (ConfigurableRequest $request, Method $method) {
    $sent = FakeIsams::send($request)->getPendingRequest();

    expect($sent->getMethod())->toBe($method)
        ->and($sent->getUrl())->toBe('https://isams.example.test/api/school/terms');
})->with([
    'GET by default' => [new ConfigurableRequest('/api/school/terms'), Method::GET],
    'another method' => [new ConfigurableRequest('/api/school/terms', Method::POST), Method::POST],
]);

it('refuses a configurable endpoint on another host', function () {
    FakeIsams::respondWith();

    expect(fn () => FakeIsams::connector()->send(new ConfigurableRequest('https://elsewhere.example.test/api/students')))
        ->toThrow(InvalidArgumentException::class, 'Absolute URLs are not allowed in the endpoint.');
});

it('pages through a configurable endpoint, collecting the items under the result key it was given', function () {
    $isams = FakeIsams::respondWith([ConfigurablePaginatedRequest::class => MockResponse::make(['terms' => [['id' => 1]], 'totalPages' => 1])]);

    $terms = FakeIsams::connector()
        ->paginate(new ConfigurablePaginatedRequest('/api/school/terms', expand: 'dates', filter: 'year eq 2026', resultKey: 'terms'))
        ->collect()
        ->all();

    expect($terms)->toBe([['id' => 1]])
        ->and(FakeIsams::received($isams, ConfigurablePaginatedRequest::class)->getUrl())->toBe('https://isams.example.test/api/school/terms')
        ->and(FakeIsams::queriesReceived($isams, ConfigurablePaginatedRequest::class)[0])->toMatchArray(['expand' => 'dates', '$filter' => 'year eq 2026']);
});

it('can build a configurable paginated request without a result key')
    ->todo(note: 'Suspected bug: the constructor defaults $resultKey to null but assigns it to a non-nullable string property, so leaving it out throws a TypeError (src/Requests/ConfigurablePaginatedRequest.php, __construct())')
    ->group('suspected-bug');
