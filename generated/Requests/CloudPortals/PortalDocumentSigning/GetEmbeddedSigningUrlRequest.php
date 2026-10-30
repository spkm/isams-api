<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\PortalDocumentSigning;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get embedded signing URL
 *
 * GET /api/portals/documentsigning/signingrequest/{signingRequestId}
 */
class GetEmbeddedSigningUrlRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $signingRequestId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/documentsigning/signingrequest/'.rawurlencode((string) $this->signingRequestId);
    }
}
