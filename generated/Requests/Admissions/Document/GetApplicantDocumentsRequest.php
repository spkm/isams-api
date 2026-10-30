<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Document;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\ApplicantDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the documents of an applicant.
 *
 * GET /api/admissions/applicants/{schoolId}/documents
 */
class GetApplicantDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ApplicantDocument::class;
    public string $resultKey = 'documents';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/documents';
    }
}
