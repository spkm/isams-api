<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Document\PrivatePortalDocumentSigningDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get documents for signing
 *
 * GET /api/portals/documentsigning/signingrequests
 */
class GetDocumentsForSigningRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PrivatePortalDocumentSigningDocument::class;
    public string $resultKey = 'portalDocumentSigningDocuments';

    public function resolveEndpoint(): string
    {
        return '/api/portals/documentsigning/signingrequests';
    }
}
