<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\CloudPortals\Reports\AcademicReportsResource;

class ReportsResource extends BaseResource
{
    public function academicReports(): AcademicReportsResource
    {
        return new AcademicReportsResource($this->connector);
    }
}
