<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\VisaDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single document for an applicant visa by document id.
 *
 * GET /api/admissions/applicants/{schoolId}/visa/{visaId}/documents/{documentId}
 */
#[Beta]
class GetApplicantVisaDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ApplicantVisaDocument::class;

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
