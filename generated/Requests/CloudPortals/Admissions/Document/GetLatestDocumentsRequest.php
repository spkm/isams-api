<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Document;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\Document;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get latest documents by user
 *
 * GET /api/portals/documents/latest
 */
class GetLatestDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Document::class;
    public string $resultKey = 'documents';

    public function resolveEndpoint(): string
    {
        return '/api/portals/documents/latest';
    }
}
