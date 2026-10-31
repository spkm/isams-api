<?php

namespace spkm\IsamsApi;

use DateTimeImmutable;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use Saloon\Config;
use Saloon\Contracts\OAuthAuthenticator;
use Saloon\Enums\Method;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;
use Saloon\Traits\Plugins\HasTimeout;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Support\CircuitBreaker;

/**
 * What the REST and Batch API connectors share: the client credentials token, cached encrypted, timeouts, retries,
 * re-authentication and the circuit breaker.
 */
abstract class IsamsBaseConnector extends Connector
{
    use ClientCredentialsGrant;
    use HasTimeout;

    protected string $baseUrl;

    protected float $connectTimeout;

    protected float $requestTimeout;

    /**
     * @param  list<string>  $scopes
     */
    public function __construct(string $clientId, string $clientSecret, string $baseUrl, array $scopes = ['restapi'])
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);
        $this->oauthConfig()->setDefaultScopes($scopes);
        $this->baseUrl = $baseUrl;

        $this->connectTimeout = (float) config('isams-api.timeouts.connect', Config::$defaultConnectionTimeout);
        $this->requestTimeout = (float) config('isams-api.timeouts.request', Config::$defaultRequestTimeout);

        if (config('isams-api.retries.times')) {
            $this->tries = (int) config('isams-api.retries.times');
            $this->retryInterval = (int) config('isams-api.retries.interval_ms', 500);
            $this->useExponentialBackoff = true;
            $this->throwOnMaxTries = false;
        }

        if (CircuitBreaker::enabled()) {
            $this->watchForOutages(CircuitBreaker::for($baseUrl));
        }
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        $this->ensureAuthenticated($request);

        $response = parent::send($request, $mockClient, $handleRetry);

        if ($response->status() === 401 && config('isams-api.reauthenticate') && ! $request instanceof GetClientCredentialsTokenRequest && ! IsamsApiException::refusesPermission($response)) {
            Cache::forget($this->getCacheKey());
            $this->authenticate($this->cacheAccessToken());

            return parent::send($request, $mockClient, $handleRetry);
        }

        return $response;
    }

    public function sendAsync(Request $request, ?MockClient $mockClient = null): PromiseInterface
    {
        $this->ensureAuthenticated($request);

        return parent::sendAsync($request, $mockClient);
    }

    /**
     * Fetches a token (from the cache, or from iSAMS) before the connector's first request, and a new one once the token
     * it holds is a minute from expiring, as a connector in a long-running worker needs. Building a connector never
     * contacts iSAMS.
     */
    private function ensureAuthenticated(Request $request): void
    {
        if ($request instanceof GetClientCredentialsTokenRequest) {
            return;
        }

        if ($this->getAuthenticator() === null || $this->tokenExpiresWithinAMinute()) {
            $this->authenticate($this->getCachedAccessToken());
        }
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        $isSafe = $request instanceof IsamsRequest ? $request->isSafe() : $request->getMethod() === Method::GET;

        if (! $isSafe || $exception instanceof IsamsUnavailable) {
            return false;
        }

        return $exception instanceof FatalRequestException
            || in_array($exception->getResponse()->status(), [408, 429], true)
            || $exception->getResponse()->serverError();
    }

    private function watchForOutages(CircuitBreaker $breaker): void
    {
        $this->middleware()
            ->onRequest(function (PendingRequest $pendingRequest) use ($breaker): void {
                if ($breaker->isOpen()) {
                    throw IsamsUnavailable::for($pendingRequest);
                }
            })
            ->onResponse(function (Response $response) use ($breaker): void {
                if ($response->isCached()) {
                    return;
                }

                if (in_array($response->status(), [502, 503, 504], true)) {
                    $breaker->recordFailure();
                } elseif ($response->status() !== 500) {
                    $breaker->recordSuccess();
                }
            })
            ->onFatalException(function (FatalRequestException $exception) use ($breaker): void {
                if (! $exception instanceof IsamsUnavailable) {
                    $breaker->recordFailure();
                }
            });
    }

    public function getCachedAccessToken(): OAuthAuthenticator|Response
    {
        $cached = Cache::get($this->getCacheKey());

        if (is_string($cached)) {
            try {
                $token = json_decode(Crypt::decryptString($cached), true, flags: JSON_THROW_ON_ERROR);
            } catch (DecryptException|JsonException) {
                $token = null;
            }

            if (is_string($token['access_token'] ?? null) && is_int($token['expires_at'] ?? null)) {
                return new AccessTokenAuthenticator($token['access_token'], null, new DateTimeImmutable('@'.$token['expires_at']));
            }
        }

        return $this->cacheAccessToken();
    }

    /**
     * Whether the token the connector holds is a minute or less from expiring, as it will be in a long-running worker.
     */
    private function tokenExpiresWithinAMinute(): bool
    {
        $authenticator = $this->getAuthenticator();
        $expiresAt = $authenticator instanceof AccessTokenAuthenticator ? $authenticator->getExpiresAt() : null;

        return $expiresAt !== null && $expiresAt->getTimestamp() - 60 <= Config::now()->getTimestamp();
    }

    /**
     * The token's cache key: one per school, client and set of scopes, hashed so that a Batch API key, which iSAMS takes
     * as the client id, never appears in the cache.
     */
    private function getCacheKey(): string
    {
        return 'isams-api.token.'.sha1($this->baseUrl.'|'.$this->oauthConfig()->getClientId().'|'.implode(' ', $this->oauthConfig()->getDefaultScopes()));
    }

    private function cacheAccessToken(): AccessTokenAuthenticator
    {
        try {
            /** @var AccessTokenAuthenticator $authenticator */
            $authenticator = $this->getAccessToken();
        } catch (RequestException $exception) {
            throw IsamsApiException::fromResponse($exception->getResponse());
        }

        $expiresAt = $authenticator->getExpiresAt();

        if ($expiresAt === null) {
            return $authenticator;
        }

        Cache::put(
            $this->getCacheKey(),
            Crypt::encryptString(json_encode([
                'access_token' => $authenticator->getAccessToken(),
                'expires_at' => $expiresAt->getTimestamp(),
            ], JSON_THROW_ON_ERROR)),
            Carbon::instance($expiresAt)->subMinute(),
        );

        return $authenticator;
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setTokenEndpoint('auth/connect/token')
            ->setRequestModifier(function (Request $request) {
                $request->query()->add('grant_type', 'client_credentials');
            });
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultHeaders(): array
    {
        return [
            'cache-control' => 'no-cache',
            'Accept' => 'application/json',
        ];
    }
}
