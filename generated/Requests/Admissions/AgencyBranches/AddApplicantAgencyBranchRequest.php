<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\AgencyBranches;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates an agency branch with an applicant.
 *
 * POST /api/admissions/applicants/{schoolId}/agencybranches/{agencyBranchId}
 */
class AddApplicantAgencyBranchRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
        protected int $agencyBranchId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/agencybranches/'.rawurlencode((string) $this->agencyBranchId);
    }
}
