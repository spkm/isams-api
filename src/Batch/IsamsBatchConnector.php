<?php

namespace spkm\IsamsApi\Batch;

use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\IsamsConnector;

class IsamsBatchConnector extends IsamsConnector
{
    public function __construct(protected string $apiKey, string $clientSecret, string $baseUrl)
    {
        parent::__construct($apiKey, $clientSecret, $baseUrl, ['apiv1']);
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        if (! $pendingRequest->getRequest() instanceof GetClientCredentialsTokenRequest) {
            $pendingRequest->query()->add('apiKey', $this->apiKey);
        }
    }
}
