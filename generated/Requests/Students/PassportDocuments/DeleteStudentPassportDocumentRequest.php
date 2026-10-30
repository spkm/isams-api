<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\PassportDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a student passport document.
 *
 * DELETE /api/students/{schoolId}/passport/{passportId}/documents/{documentId}
 */
#[Beta]
class DeleteStudentPassportDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
