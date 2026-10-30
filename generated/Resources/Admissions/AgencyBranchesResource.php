<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\AgencyBranches\AddApplicantAgencyBranchRequest;
use spkm\IsamsApi\Requests\Admissions\AgencyBranches\GetApplicantAgencyBranchesRequest;
use spkm\IsamsApi\Requests\Admissions\AgencyBranches\RemoveApplicantAgencyBranchRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AgencyBranchesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Admissions\AgencyBranches\AddApplicantAgencyBranchRequest
     */
    public function add(string $schoolId, int $agencyBranchId): Created
    {
        return $this->fetch(new AddApplicantAgencyBranchRequest(schoolId: $schoolId, agencyBranchId: $agencyBranchId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\Branch>
     * @see \spkm\IsamsApi\Requests\Admissions\AgencyBranches\GetApplicantAgencyBranchesRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetApplicantAgencyBranchesRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\AgencyBranches\RemoveApplicantAgencyBranchRequest
     */
    public function remove(string $schoolId, int $agencyBranchId): void
    {
        $this->fetch(new RemoveApplicantAgencyBranchRequest(schoolId: $schoolId, agencyBranchId: $agencyBranchId));
    }
}
