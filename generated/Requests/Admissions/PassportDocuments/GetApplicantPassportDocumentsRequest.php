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
 * Retrieves all documents associated with an applicant passport.
 *
 * GET /api/admissions/applicants/{schoolId}/passport/{passportId}/documents
 */
#[Beta]
class GetApplicantPassportDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ApplicantPassportDocument::class;
    public string $resultKey = 'passportDocuments';

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents';
    }
}
