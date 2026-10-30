<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\AgencyBranches;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Disassociates an agency branch from an applicant.
 *
 * DELETE /api/admissions/applicants/{schoolId}/agencybranches/{agencyBranchId}
 */
class RemoveApplicantAgencyBranchRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
