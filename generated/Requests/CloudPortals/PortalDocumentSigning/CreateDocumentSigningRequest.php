<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Create a signing request for a document for specified contacts
 *
 * POST /api/portals/documentsigning/createSigningRequest
 */
class CreateDocumentSigningRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Integrations\CreatePortalSigningRequest|array<string, mixed>  $documentSigningCreateRequest
     */
    public function __construct(
        protected CreatePortalSigningRequest|array $documentSigningCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/documentsigning/createSigningRequest';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->documentSigningCreateRequest instanceof Data ? $this->documentSigningCreateRequest->toArray() : $this->documentSigningCreateRequest;
    }
}
