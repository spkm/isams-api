<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Exceptions\UnauthorizedException;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/**
 * Fakes iSAMS answering the token request and any ExampleRequest.
 */
function fakeIsamsAnsweringExamples(): MockClient
{
    return FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['ok' => true])]);
}

it('asks iSAMS for a client credentials token before its first request, not when it is built', function () {
    $isams = fakeIsamsAnsweringExamples();

    $connector = FakeIsams::connector('client-id');
    $isams->assertNothingSent();

    $connector->send(new ExampleRequest);

    $tokenRequest = FakeIsams::received($isams, GetClientCredentialsTokenRequest::class);
    expect($isams->getRecordedResponses()[0]->getRequest())->toBeInstanceOf(GetClientCredentialsTokenRequest::class)
        ->and($tokenRequest->getMethod()->value)->toBe('POST')
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
    $isams = fakeIsamsAnsweringExamples();

    FakeIsams::connector(scopes: ['apiv1', 'restapi'])->send(new ExampleRequest);

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

it('keeps the token in the cache under its school, client id and scopes as encrypted JSON, not a serialised object', function () {
    fakeIsamsAnsweringExamples();

    FakeIsams::connector('client-id')->send(new ExampleRequest);

    $cached = Cache::get(FakeIsams::tokenCacheKey());
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
    $isams = fakeIsamsAnsweringExamples();

    FakeIsams::connector('client-id')->send(new ExampleRequest);
    FakeIsams::connector('client-id')->send(new ExampleRequest);

    $isams->assertSentCount(1, GetClientCredentialsTokenRequest::class);
});

it('asks for a separate token for each client id', function () {
    $isams = fakeIsamsAnsweringExamples();

    FakeIsams::connector('first-client')->send(new ExampleRequest);
    FakeIsams::connector('second-client')->send(new ExampleRequest);

    $isams->assertSentCount(2, GetClientCredentialsTokenRequest::class);
});

it('asks for a separate token for the same client id at another school', function () {
    $isams = fakeIsamsAnsweringExamples();

    FakeIsams::connector('client-id')->send(new ExampleRequest);
    (new IsamsConnector('client-id', 'client-secret', 'https://prep.example.test'))->send(new ExampleRequest);

    $isams->assertSentCount(2, GetClientCredentialsTokenRequest::class);
});

it('never puts the client id, which for the Batch API is its key, in the token\'s cache key', function () {
    fakeIsamsAnsweringExamples();

    FakeIsams::connector('MADE-UP-BATCH-KEY')->send(new ExampleRequest);

    expect(Cache::has(FakeIsams::tokenCacheKey('MADE-UP-BATCH-KEY')))->toBeTrue()
        ->and(FakeIsams::tokenCacheKey('MADE-UP-BATCH-KEY'))->not->toContain('MADE-UP-BATCH-KEY');
});

it('asks for a new token once the cached one is a minute from expiring', function () {
    FakeIsams::syncSaloonClockWithLaravel();
    $this->freezeTime();
    $isams = fakeIsamsAnsweringExamples();
    FakeIsams::connector()->send(new ExampleRequest);

    $this->travel(58)->minutes();
    FakeIsams::connector()->send(new ExampleRequest);
    $isams->assertSentCount(1, GetClientCredentialsTokenRequest::class);

    $this->travel(1)->minutes();
    FakeIsams::connector()->send(new ExampleRequest);
    $isams->assertSentCount(2, GetClientCredentialsTokenRequest::class);
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
    $connector->send(new ExampleRequest);

    $this->travel(58)->minutes();
    $connector->send(new ExampleRequest);
    $isams->assertSentCount(1, GetClientCredentialsTokenRequest::class);

    $this->travel(1)->minutes();
    $response = $connector->send(new ExampleRequest);
    $isams->assertSentCount(2, GetClientCredentialsTokenRequest::class);

    expect($response->getPendingRequest()->headers()->get('Authorization'))->toBe('Bearer token-2');
});

it('fails its first request when iSAMS refuses its credentials, saying so, and caches nothing', function () {
    MockClient::global([GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => 'invalid_client'], 401)]);

    $connector = FakeIsams::connector('client-id');

    expect(fn () => $connector->send(new ExampleRequest))->toThrow(UnauthorizedException::class)
        ->and(Cache::has(FakeIsams::tokenCacheKey()))->toBeFalse();
});

it('uses a token that has no expiry without caching it', function () {
    $isams = MockClient::global([
        GetClientCredentialsTokenRequest::class => MockResponse::make(['access_token' => 'fake-token', 'token_type' => 'Bearer']),
        ExampleRequest::class => MockResponse::make(['ok' => true]),
    ]);

    FakeIsams::connector('client-id')->send(new ExampleRequest);
    FakeIsams::connector('client-id')->send(new ExampleRequest);

    $isams->assertSentCount(2, GetClientCredentialsTokenRequest::class);
    expect(Cache::has(FakeIsams::tokenCacheKey()))->toBeFalse();
});

it('asks for a new token when the cached entry is unreadable', function () {
    Cache::put(FakeIsams::tokenCacheKey(), Crypt::encryptString('{"unexpected":true}'), now()->addHour());
    $isams = fakeIsamsAnsweringExamples();

    FakeIsams::connector('client-id')->send(new ExampleRequest);

    $isams->assertSentCount(1, GetClientCredentialsTokenRequest::class);
});

it('asks for a new token when the cached entry cannot be decrypted', function () {
    Cache::put(FakeIsams::tokenCacheKey(), 'not encrypted with this app\'s key', now()->addHour());
    $isams = fakeIsamsAnsweringExamples();

    FakeIsams::connector('client-id')->send(new ExampleRequest);

    $isams->assertSentCount(1, GetClientCredentialsTokenRequest::class);
});
