<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Exceptions\UnauthorizedException;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('asks iSAMS for a client credentials token as soon as it is built', function () {
    $isams = FakeIsams::respondWith();

    FakeIsams::connector('client-id');

    $tokenRequest = FakeIsams::received($isams, GetClientCredentialsTokenRequest::class);
    expect($tokenRequest->getMethod()->value)->toBe('POST')
        ->and($tokenRequest->getUrl())->toBe('https://isams.example.test/auth/connect/token')
        ->and($tokenRequest->query()->all())->toBe(['grant_type' => 'client_credentials'])
        ->and($tokenRequest->body()->all())->toBe([
            'grant_type' => 'client_credentials',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
            'scope' => 'restapi',
        ]);
});

it('asks for the scopes it was built with, separated by spaces', function () {
    $isams = FakeIsams::respondWith();

    FakeIsams::connector(scopes: ['apiv1', 'restapi']);

    expect(FakeIsams::received($isams, GetClientCredentialsTokenRequest::class)->body()->get('scope'))->toBe('apiv1 restapi');
});

it('sends requests to iSAMS with the bearer token and its default headers', function () {
    $isams = FakeIsams::respondWith([GetStudentRequest::class => MockResponse::make(['id' => 1])]);

    FakeIsams::connector()->send(new GetStudentRequest('100001'));

    expect(FakeIsams::received($isams, GetStudentRequest::class)->createPsrRequest()->getHeaders())->toBe([
        'Host' => ['isams.example.test'],
        'cache-control' => ['no-cache'],
        'Accept' => ['application/json'],
        'Authorization' => ['Bearer fake-token'],
    ]);
});

it('keeps the token in the cache under its client id as encrypted JSON, not a serialised object', function () {
    FakeIsams::respondWith();

    FakeIsams::connector('client-id');

    $cached = Cache::get('isams-api.token.client-id');
    expect($cached)->toBeString()->not->toContain('fake-token')
        ->and(json_decode(Crypt::decryptString($cached), true))->toHaveKey('access_token', 'fake-token');
});

it('ignores a token cached by earlier versions and asks iSAMS for a new one', function () {
    Cache::put('bearer_tokenclient-id', encrypt(new AccessTokenAuthenticator('old-token')), now()->addHour());
    $isams = FakeIsams::respondWith([GetStudentRequest::class => MockResponse::make(['id' => 1])]);

    FakeIsams::connector('client-id')->send(new GetStudentRequest('100001'));

    $isams->assertSent(GetClientCredentialsTokenRequest::class);
    expect(FakeIsams::received($isams, GetStudentRequest::class)->headers()->get('Authorization'))->toBe('Bearer fake-token');
});

it('reuses the cached token when built again with the same client id', function () {
    $isams = FakeIsams::respondWith();

    FakeIsams::connector('client-id');
    FakeIsams::connector('client-id');

    $isams->assertSentCount(1);
});

it('asks for a separate token for each client id', function () {
    $isams = FakeIsams::respondWith();

    FakeIsams::connector('first-client');
    FakeIsams::connector('second-client');

    $isams->assertSentCount(2);
});

it('asks for a new token once the cached one is a minute from expiring', function () {
    FakeIsams::syncSaloonClockWithLaravel();
    $this->freezeTime();
    $isams = FakeIsams::respondWith();
    FakeIsams::connector();

    $this->travel(58)->minutes();
    FakeIsams::connector();
    $isams->assertSentCount(1);

    $this->travel(1)->minutes();
    FakeIsams::connector();
    $isams->assertSentCount(2);
});

it('fetches a new token before sending once the one it holds is a minute from expiring, as a long-running worker needs', function () {
    FakeIsams::syncSaloonClockWithLaravel();
    $this->freezeTime();
    $tokensIssued = 0;
    $isams = FakeIsams::respondWith([
        GetClientCredentialsTokenRequest::class => function () use (&$tokensIssued) {
            return FakeIsams::token('token-'.++$tokensIssued);
        },
        ExampleRequest::class => MockResponse::make(['ok' => true]),
    ]);
    $connector = FakeIsams::connector();

    $this->travel(58)->minutes();
    $connector->send(new ExampleRequest);
    $isams->assertSentCount(1, GetClientCredentialsTokenRequest::class);

    $this->travel(1)->minutes();
    $response = $connector->send(new ExampleRequest);
    $isams->assertSentCount(2, GetClientCredentialsTokenRequest::class);

    expect($response->getPendingRequest()->headers()->get('Authorization'))->toBe('Bearer token-2');
});

it('cannot be built when iSAMS refuses its credentials, saying so, and caches nothing', function () {
    MockClient::global([GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => 'invalid_client'], 401)]);

    expect(fn () => FakeIsams::connector('client-id'))->toThrow(UnauthorizedException::class)
        ->and(Cache::has('isams-api.token.client-id'))->toBeFalse();
});

it('uses a token that has no expiry without caching it', function () {
    $isams = MockClient::global([GetClientCredentialsTokenRequest::class => MockResponse::make(['access_token' => 'fake-token', 'token_type' => 'Bearer'])]);

    FakeIsams::connector('client-id');
    FakeIsams::connector('client-id');

    $isams->assertSentCount(2);
    expect(Cache::has('isams-api.token.client-id'))->toBeFalse();
});

it('asks for a new token when the cached entry is unreadable', function () {
    Cache::put('isams-api.token.client-id', Crypt::encryptString('{"unexpected":true}'), now()->addHour());
    $isams = FakeIsams::respondWith();

    FakeIsams::connector('client-id');

    $isams->assertSentCount(1);
});
