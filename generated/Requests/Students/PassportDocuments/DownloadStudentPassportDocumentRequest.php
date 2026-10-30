<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\PassportDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Downloads a student passport document resource.
 *
 * GET /api/students/{schoolId}/passport/{passportId}/documents/{documentId}/download
 */
#[Beta]
class DownloadStudentPassportDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents/'.rawurlencode((string) $this->documentId).'/download';
    }
}
