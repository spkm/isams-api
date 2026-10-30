<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Visits\GetAdmissionVisitSummaryBySchoolIdsRequest;

class VisitsResource extends BaseResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getSummaryBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetAdmissionVisitSummaryBySchoolIdsRequest($schoolIds));
    }
}
