<?php

namespace spkm\IsamsApi\Batch;

use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\IsamsBaseConnector;

class IsamsBatchConnector extends IsamsBaseConnector
{
    use HasBatchGroups;

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

    public function studentPhotos(): BatchPhotos
    {
        $request = BatchPhotosRequest::students();

        return $request->createDtoFromResponse($this->send($request));
    }

    public function staffPhotos(): BatchPhotos
    {
        $request = BatchPhotosRequest::staff();

        return $request->createDtoFromResponse($this->send($request));
    }
}
