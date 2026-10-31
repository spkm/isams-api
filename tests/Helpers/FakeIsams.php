<?php

namespace spkm\IsamsApi\Tests\Helpers;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\IsamsApi\IsamsConnector;

class FakeIsams
{
    public const BASE_URL = 'https://isams.example.test';

    /**
     * Fake iSAMS: the token endpoint answers with a token, and each request class with the given response.
     *
     * @param  array<class-string<Request>, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWith(array $responses = []): MockClient
    {
        return MockClient::global([GetClientCredentialsTokenRequest::class => self::token(), ...$responses]);
    }

    public static function token(string $accessToken = 'fake-token', int $expiresIn = 3600): MockResponse
    {
        return MockResponse::make(['access_token' => $accessToken, 'expires_in' => $expiresIn, 'token_type' => 'Bearer']);
    }

    public static function connector(string $clientId = 'client-id', array $scopes = ['restapi']): IsamsConnector
    {
        return new IsamsConnector($clientId, 'client-secret', self::BASE_URL, $scopes);
    }

    /**
     * The cache key a connector keeps its token under.
     *
     * @param  list<string>  $scopes
     */
    public static function tokenCacheKey(string $clientId = 'client-id', array $scopes = ['restapi'], string $baseUrl = self::BASE_URL): string
    {
        return 'isams-api.token.'.sha1($baseUrl.'|'.$clientId.'|'.implode(' ', $scopes));
    }

    /**
     * Send one request through a connector to a faked iSAMS that answers it with the given body.
     */
    public static function send(Request $request, array|string $body = []): Response
    {
        self::respondWith([$request::class => MockResponse::make($body)]);

        return self::connector()->send($request);
    }

    /**
     * The request iSAMS received for the given request class, as Saloon built it.
     *
     * @param  class-string<Request>  $requestClass
     */
    public static function received(MockClient $mockClient, string $requestClass): PendingRequest
    {
        return $mockClient->findResponseByRequest($requestClass)->getPendingRequest();
    }

    /**
     * The query strings iSAMS received for every request of the given class, in the order they were sent.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<array<string, mixed>>
     */
    public static function queriesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => $response->getPendingRequest()->query()->all())
            ->values()
            ->all();
    }

    /**
     * Make Saloon's clock (which dates the token) follow Laravel's (which expires the cache), so time travel moves both.
     */
    public static function syncSaloonClockWithLaravel(): void
    {
        Config::setClock(new class implements ClockInterface
        {
            public function now(): DateTimeImmutable
            {
                return now()->toDateTimeImmutable();
            }
        });
    }
}
