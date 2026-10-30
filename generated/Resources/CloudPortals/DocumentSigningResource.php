<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\CreateDocumentSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetDocumentsForSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlForDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlRequest;

class DocumentSigningResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest|array<string, mixed>  $createPortalSigningRequest
     */
    public function create(CreatePortalSigningRequest|array $createPortalSigningRequest): Response
    {
        return $this->connector->send(new CreateDocumentSigningRequest($createPortalSigningRequest));
    }

    public function getDocuments(): Response
    {
        return $this->connector->send(new GetDocumentsForSigningRequest());
    }

    public function getEmbeddedUrl(string $signingRequestId): Response
    {
        return $this->connector->send(new GetEmbeddedSigningUrlRequest($signingRequestId));
    }

    public function getEmbeddedUrlForDocument(string $documentGuid): Response
    {
        return $this->connector->send(new GetEmbeddedSigningUrlForDocumentRequest($documentGuid));
    }
}
