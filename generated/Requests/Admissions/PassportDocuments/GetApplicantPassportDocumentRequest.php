<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\PassportDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single document for an applicant passport by document id.
 *
 * GET /api/admissions/applicants/{schoolId}/passport/{passportId}/documents/{documentId}
 */
#[Beta]
class GetApplicantPassportDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ApplicantPassportDocument::class;

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
