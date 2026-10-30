<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Visits\GetAdmissionVisitSummaryBySchoolIdsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisitsResource extends IsamsResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\AdmissionsVisitSummary>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Visits\GetAdmissionVisitSummaryBySchoolIdsRequest
     */
    public function getSummaryBySchoolIds(?array $schoolIds = null): Collection
    {
        return $this->fetch(new GetAdmissionVisitSummaryBySchoolIdsRequest(schoolIds: $schoolIds));
    }
}
