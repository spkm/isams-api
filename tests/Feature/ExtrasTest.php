<?php

use Saloon\Config;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\IsamsUnavailable;
use spkm\IsamsApi\Requests\AdhocRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

beforeEach(fn () => Config::sleepUsing(fn () => null));
afterEach(fn () => Config::sleepUsing(null));

/**
 * iSAMS answering a request class with each response in turn, then the last one for ever.
 *
 * @param  list<MockResponse>  $responses
 */
function inTurn(array $responses): Closure
{
    return function () use (&$responses) {
        return count($responses) > 1 ? array_shift($responses) : $responses[0];
    };
}

function requestsSent(MockClient $isams, string $requestClass): int
{
    return count(array_filter($isams->getRecordedResponses(), fn ($response) => $response->getRequest() instanceof $requestClass));
}

it('uses Saloon\'s default timeouts unless others are configured', function (array $config, array $expected) {
    config(['isams-api.timeouts' => $config]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make([])]);

    FakeIsams::connector()->send(new ExampleRequest);

    $sent = FakeIsams::received($isams, ExampleRequest::class)->config();
    expect([$sent->get('connect_timeout'), $sent->get('timeout')])->toBe($expected);
})->with([
    'defaults' => [[], [10.0, 30.0]],
    'configured' => [['connect' => 3, 'request' => 8], [3.0, 8.0]],
]);

it('does not retry failed requests unless retries are configured', function () {
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['message' => 'Busy'], 503)]);

    $response = FakeIsams::connector()->send(new ExampleRequest);

    expect($response->status())->toBe(503)
        ->and(requestsSent($isams, ExampleRequest::class))->toBe(1);
});

it('retries a GET that iSAMS answers with a server error, up to the configured number of times', function () {
    config(['isams-api.retries.times' => 3]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => inTurn([MockResponse::make([], 503), MockResponse::make([], 502), MockResponse::make(['ok' => true])])]);

    $response = FakeIsams::connector()->send(new ExampleRequest);

    expect($response->json())->toBe(['ok' => true])
        ->and(requestsSent($isams, ExampleRequest::class))->toBe(3);
});

it('returns the last failed response, without throwing, once retries run out', function () {
    config(['isams-api.retries.times' => 2]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['message' => 'Busy'], 503)]);

    $response = FakeIsams::connector()->send(new ExampleRequest);

    expect($response->status())->toBe(503)
        ->and(requestsSent($isams, ExampleRequest::class))->toBe(2);
});

it('never retries a write', function () {
    config(['isams-api.retries.times' => 3]);
    $isams = FakeIsams::respondWith([AdhocRequest::class => MockResponse::make([], 503)]);

    $response = FakeIsams::connector()->post('/api/students', ['forename' => 'Alex']);

    expect($response->status())->toBe(503)
        ->and(requestsSent($isams, AdhocRequest::class))->toBe(1);
});

it('returns a 401 as it is unless re-authentication is configured', function () {
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['message' => 'Authorization has been denied for this request.'], 401)]);

    $response = FakeIsams::connector()->send(new ExampleRequest);

    expect($response->status())->toBe(401)
        ->and(requestsSent($isams, GetClientCredentialsTokenRequest::class))->toBe(1);
});

it('fetches a new token once and repeats the request when iSAMS rejects the cached one', function () {
    config(['isams-api.reauthenticate' => true]);
    $isams = FakeIsams::respondWith([
        GetClientCredentialsTokenRequest::class => inTurn([FakeIsams::token('first-token'), FakeIsams::token('second-token')]),
        ExampleRequest::class => inTurn([MockResponse::make([], 401), MockResponse::make(['ok' => true])]),
    ]);

    $response = FakeIsams::connector()->send(new ExampleRequest);

    expect($response->json())->toBe(['ok' => true])
        ->and(requestsSent($isams, GetClientCredentialsTokenRequest::class))->toBe(2)
        ->and($response->getPendingRequest()->headers()->get('Authorization'))->toBe('Bearer second-token');
});

it('returns a second 401 after re-authenticating as an ordinary response', function () {
    config(['isams-api.reauthenticate' => true]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make([], 401)]);

    $response = FakeIsams::connector()->send(new ExampleRequest);

    expect($response->status())->toBe(401)
        ->and(requestsSent($isams, ExampleRequest::class))->toBe(2);
});

it('caches a cacheable request\'s response only when caching is configured', function (bool $enabled, bool $cacheable, int $sent) {
    config(['isams-api.cache.enabled' => $enabled]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['terms' => []])]);
    $connector = FakeIsams::connector();

    $connector->send(new ExampleRequest(cacheable: $cacheable));
    $connector->send(new ExampleRequest(cacheable: $cacheable));

    expect(requestsSent($isams, ExampleRequest::class))->toBe($sent);
})->with([
    'caching off' => [false, true, 2],
    'caching on, cacheable request' => [true, true, 1],
    'caching on, ordinary request' => [true, false, 2],
]);

it('keeps cached responses separate for each school', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['terms' => []])]);

    FakeIsams::connector()->send(new ExampleRequest(cacheable: true));
    (new IsamsConnector('client-id', 'client-secret', 'https://prep.example.test'))->send(new ExampleRequest(cacheable: true));

    expect(requestsSent($isams, ExampleRequest::class))->toBe(2);
});

it('fails instantly with IsamsUnavailable once iSAMS has failed repeatedly, until the cooldown passes', function () {
    config(['isams-api.circuit_breaker' => ['enabled' => true, 'failures' => 2, 'window_seconds' => 60, 'cooldown_seconds' => 30]]);
    $this->freezeTime();
    $isams = FakeIsams::respondWith([ExampleRequest::class => inTurn([MockResponse::make([], 503), MockResponse::make([], 500), MockResponse::make(['ok' => true])])]);
    $connector = FakeIsams::connector();

    $connector->send(new ExampleRequest);
    $connector->send(new ExampleRequest);

    expect(fn () => $connector->send(new ExampleRequest))->toThrow(IsamsUnavailable::class)
        ->and(requestsSent($isams, ExampleRequest::class))->toBe(2);

    $this->travel(31)->seconds();

    expect($connector->send(new ExampleRequest)->json())->toBe(['ok' => true])
        ->and(fn () => $connector->send(new ExampleRequest))->not->toThrow(IsamsUnavailable::class);
});

it('counts connection failures towards opening the circuit', function () {
    config(['isams-api.circuit_breaker' => ['enabled' => true, 'failures' => 1, 'window_seconds' => 60, 'cooldown_seconds' => 30]]);
    FakeIsams::respondWith([ExampleRequest::class => MockResponse::make()->throw(fn (PendingRequest $request) => new FatalRequestException(new RuntimeException('Connection refused'), $request))]);
    $connector = FakeIsams::connector();

    expect(fn () => $connector->send(new ExampleRequest))->toThrow(FatalRequestException::class)
        ->and(fn () => $connector->send(new ExampleRequest))->toThrow(IsamsUnavailable::class);
});

it('leaves the circuit closed however often iSAMS fails unless the breaker is configured', function () {
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make([], 503)]);
    $connector = FakeIsams::connector();

    foreach (range(1, 6) as $attempt) {
        $connector->send(new ExampleRequest);
    }

    expect(requestsSent($isams, ExampleRequest::class))->toBe(6);
});

it('says whether iSAMS is available, without contacting it', function () {
    config([
        'isams-api.base_url' => FakeIsams::BASE_URL,
        'isams-api.circuit_breaker' => ['enabled' => true, 'failures' => 1, 'window_seconds' => 60, 'cooldown_seconds' => 30],
    ]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make([], 503)]);

    expect(Isams::isAvailable())->toBeTrue();

    FakeIsams::connector()->send(new ExampleRequest);

    expect(Isams::isAvailable())->toBeFalse()
        ->and(requestsSent($isams, ExampleRequest::class))->toBe(1);
});

it('keeps cached responses separate for each set of credentials at the same school', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['terms' => []])]);

    FakeIsams::connector('first-client')->send(new ExampleRequest(cacheable: true));
    FakeIsams::connector('second-client')->send(new ExampleRequest(cacheable: true));

    expect(requestsSent($isams, ExampleRequest::class))->toBe(2);
});

it('does not let responses served from the cache close the circuit', function () {
    config([
        'isams-api.cache.enabled' => true,
        'isams-api.circuit_breaker' => ['enabled' => true, 'failures' => 2, 'window_seconds' => 60, 'cooldown_seconds' => 30],
    ]);
    FakeIsams::respondWith([ExampleRequest::class => inTurn([MockResponse::make(['terms' => []]), MockResponse::make([], 503)])]);
    $connector = FakeIsams::connector();
    $connector->send(new ExampleRequest(cacheable: true));

    $connector->send(new ExampleRequest);
    $connector->send(new ExampleRequest(cacheable: true));
    $connector->send(new ExampleRequest);

    expect(fn () => $connector->send(new ExampleRequest))->toThrow(IsamsUnavailable::class);
});
