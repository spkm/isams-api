<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Admissions\AgencyBranches\AddApplicantAgencyBranchRequest;
use spkm\IsamsApi\Requests\Admissions\AgencyBranches\GetApplicantAgencyBranchesRequest;
use spkm\IsamsApi\Requests\Admissions\AgencyBranches\RemoveApplicantAgencyBranchRequest;

class AgencyBranchesResource extends BaseResource
{
    public function addApplicantAgencyBranch(string $schoolId, int $agencyBranchId): Response
    {
        return $this->connector->send(new AddApplicantAgencyBranchRequest($schoolId, $agencyBranchId));
    }

    public function getApplicantAgencyBranches(string $schoolId): Response
    {
        return $this->connector->send(new GetApplicantAgencyBranchesRequest($schoolId));
    }

    public function removeApplicantAgencyBranch(string $schoolId, int $agencyBranchId): Response
    {
        return $this->connector->send(new RemoveApplicantAgencyBranchRequest($schoolId, $agencyBranchId));
    }
}
