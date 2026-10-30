<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning\CreateDocumentSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning\GetDocumentsForSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning\GetEmbeddedSigningUrlForDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning\GetEmbeddedSigningUrlRequest;

class PortalDocumentSigningResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest|array<string, mixed>  $documentSigningCreateRequest
     */
    public function createDocumentSigning(CreatePortalSigningRequest|array $documentSigningCreateRequest): Response
    {
        return $this->connector->send(new CreateDocumentSigningRequest($documentSigningCreateRequest));
    }

    public function getDocumentsForSigning(): Response
    {
        return $this->connector->send(new GetDocumentsForSigningRequest());
    }

    public function getEmbeddedSigningUrl(string $signingRequestId): Response
    {
        return $this->connector->send(new GetEmbeddedSigningUrlRequest($signingRequestId));
    }

    public function getEmbeddedSigningUrlForDocument(string $documentGuid): Response
    {
        return $this->connector->send(new GetEmbeddedSigningUrlForDocumentRequest($documentGuid));
    }
}
