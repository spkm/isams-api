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
 * Retrieves all documents associated with an applicant visa.
 *
 * GET /api/admissions/applicants/{schoolId}/visa/{visaId}/documents
 */
#[Beta]
class GetApplicantVisaDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ApplicantVisaDocument::class;
    public string $resultKey = 'visaDocuments';

    public function __construct(
        protected string $schoolId,
        protected int $visaId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents';
    }
}
