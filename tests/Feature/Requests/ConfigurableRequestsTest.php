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

it('pages through a configurable endpoint without a result key, using each value of the whole response', function () {
    FakeIsams::respondWith([ConfigurablePaginatedRequest::class => MockResponse::make([['id' => 1], ['id' => 2]])]);

    $request = new ConfigurablePaginatedRequest('/api/school/terms');
    $paginator = FakeIsams::connector()->paginate($request)->setMaxPages(1);

    expect($paginator->collect()->all())->toBe([['id' => 1], ['id' => 2]]);
});

it('sends a configurable request as GET when its method is given as null', function (string $requestClass) {
    $sent = FakeIsams::send(new $requestClass('/api/school/terms', null))->getPendingRequest();

    expect($sent->getMethod())->toBe(Method::GET);
})->with([
    'single' => ConfigurableRequest::class,
    'paginated' => ConfigurablePaginatedRequest::class,
]);
