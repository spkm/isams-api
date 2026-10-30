<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\AgencyBranches;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\Branch;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all agency branches associated with an applicant.
 *
 * GET /api/admissions/applicants/{schoolId}/agencybranches
 */
class GetApplicantAgencyBranchesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Branch::class;
    public string $resultKey = 'agencyBranches';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/agencybranches';
    }
}
