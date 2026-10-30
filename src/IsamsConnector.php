<?php

namespace spkm\IsamsApi;

use DateTimeImmutable;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use Saloon\Contracts\OAuthAuthenticator;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class IsamsConnector extends Connector implements HasPagination
{
    use ClientCredentialsGrant;

    protected string $baseUrl;

    public function __construct(string $clientId, string $clientSecret, string $baseUrl, array $scopes = ['restapi'])
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);
        $this->oauthConfig()->setDefaultScopes($scopes);
        $this->baseUrl = $baseUrl;

        $authenticator = $this->getCachedAccessToken();
        $this->authenticate($authenticator);
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

    public function paginate(Request $request): PagedPaginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected ?int $perPageLimit = 100;

            protected function isLastPage(Response $response): bool
            {
                return $this->currentPage >= (int) $response->json('totalPages');
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                if (property_exists($request, 'resultKey')
                    && ! empty($request->resultKey)
                    && array_key_exists($request->resultKey, $response->json())) {
                    return $response->json($request->resultKey) ?? [];
                }

                return $response->json();
            }

            protected function applyPagination(Request $request): Request
            {
                $request->query()->add('page', $this->currentPage + 1);

                if (isset($this->perPageLimit)) {
                    $request->query()->add('pageSize', $this->perPageLimit);
                }

                return $request;
            }

            protected function getTotalPages(Response $response): int
            {
                return $response->json('totalPages');
            }
        };
    }
}
