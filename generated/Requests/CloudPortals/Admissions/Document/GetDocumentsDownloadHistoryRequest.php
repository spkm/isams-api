<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Document;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\DocumentDownloadHistory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get user download history for a document
 *
 * GET /api/portals/documents/downloadhistory
 */
class GetDocumentsDownloadHistoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DocumentDownloadHistory::class;
    public string $resultKey = 'documentDownloadHistorys';

    public function resolveEndpoint(): string
    {
        return '/api/portals/documents/downloadhistory';
    }
}
