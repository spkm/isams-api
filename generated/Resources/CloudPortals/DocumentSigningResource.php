<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\CreateDocumentSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetDocumentsForSigningRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlForDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentSigningResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest|array<string, mixed>  $createPortalSigningRequest
     * @see \spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\CreateDocumentSigningRequest
     */
    public function create(CreatePortalSigningRequest|array $createPortalSigningRequest): Created
    {
        return $this->fetch(new CreateDocumentSigningRequest(createPortalSigningRequest: $createPortalSigningRequest));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Document\PrivatePortalDocumentSigningDocument>
     * @see \spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetDocumentsForSigningRequest
     */
    public function getDocuments(): Collection
    {
        return $this->fetch(new GetDocumentsForSigningRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlRequest
     */
    public function getEmbeddedUrl(string $signingRequestId): mixed
    {
        return $this->fetch(new GetEmbeddedSigningUrlRequest(signingRequestId: $signingRequestId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlForDocumentRequest
     */
    public function getEmbeddedUrlForDocument(string $documentGuid): mixed
    {
        return $this->fetch(new GetEmbeddedSigningUrlForDocumentRequest(documentGuid: $documentGuid));
    }
}
