<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/medical/students/{schoolId}/documents/{documentId}/download
 */
class DownloadStudentDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $schoolId,
        protected string $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/documents/'.rawurlencode((string) $this->documentId).'/download';
    }
}
