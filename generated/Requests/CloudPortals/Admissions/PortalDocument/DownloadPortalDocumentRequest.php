<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Download document by ID
 *
 * GET /api/portals/documents/{documentId}/commands/download
 */
class DownloadPortalDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/documents/'.rawurlencode((string) $this->documentId).'/commands/download';
    }
}
