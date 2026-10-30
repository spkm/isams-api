<?php

namespace spkm\IsamsApi;

use DateTimeImmutable;
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

        $authenticator = $this->getCachedAccessToken();
        $this->authenticate($authenticator);
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        $response = parent::send($request, $mockClient, $handleRetry);

        if ($response->status() === 401 && config('isams-api.reauthenticate') && ! $request instanceof GetClientCredentialsTokenRequest) {
            Cache::forget($this->getCacheKey());
            $this->authenticate($this->cacheAccessToken());

            return parent::send($request, $mockClient, $handleRetry);
        }

        return $response;
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        $isSafe = $request instanceof IsamsRequest ? $request->isSafe() : $request->getMethod() === Method::GET;

        if (! $isSafe || $exception instanceof IsamsUnavailable) {
            return false;
        }

        return $exception instanceof FatalRequestException
            || $exception->getResponse()->status() === 429
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

                $response->serverError() ? $breaker->recordFailure() : $breaker->recordSuccess();
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

    private function getCacheKey(): string
    {
        return 'isams-api.token.'.$this->oauthConfig()->getClientId();
    }

    private function cacheAccessToken(): AccessTokenAuthenticator
    {
        /** @var AccessTokenAuthenticator $authenticator */
        $authenticator = $this->getAccessToken();
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
