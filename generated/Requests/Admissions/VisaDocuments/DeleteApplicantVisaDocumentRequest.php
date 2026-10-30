<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\VisaDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes an applicant visa document.
 *
 * DELETE /api/admissions/applicants/{schoolId}/visa/{visaId}/documents/{documentId}
 */
#[Beta]
class DeleteApplicantVisaDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
