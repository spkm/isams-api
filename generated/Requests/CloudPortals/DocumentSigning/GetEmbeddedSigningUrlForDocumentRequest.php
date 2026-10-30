<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\DocumentSigning;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get embedded signing URL for a document
 *
 * GET /api/portals/documentsigning/signingrequest/document/{documentGuid}
 */
class GetEmbeddedSigningUrlForDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $documentGuid,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/documentsigning/signingrequest/document/'.rawurlencode((string) $this->documentGuid);
    }
}
