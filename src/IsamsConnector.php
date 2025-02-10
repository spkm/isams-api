<?php

namespace spkm\IsamsApi;

use Saloon\Helpers\OAuth2\OAuthConfig;
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

        //TODO securely cache the access token
        $authenticator = $this->getAccessToken();
        $this->authenticate($authenticator);
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
            'Content-type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ];
    }

    public function paginate(Request $request): PagedPaginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected ?int $perPageLimit = 1;

            protected function isLastPage(Response $response): bool
            {
                return is_null($response->json('next_page_url'));
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json();
            }

            protected function applyPagination(Request $request): Request
            {
                $request->query()->add('page', $this->currentPage);

                if(isset($this->perPageLimit)) {
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
