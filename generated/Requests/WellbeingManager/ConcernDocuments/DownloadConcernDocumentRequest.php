<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a concern document file.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{concernId}/documents/{documentId}/data
 */
class DownloadConcernDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/documents/'.rawurlencode((string) $this->documentId).'/data';
    }
}
