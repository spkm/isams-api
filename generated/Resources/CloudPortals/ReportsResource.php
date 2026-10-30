<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use spkm\IsamsApi\Resources\CloudPortals\Reports\AcademicReportsResource;
use spkm\IsamsApi\Resources\IsamsResource;

class ReportsResource extends IsamsResource
{
    public function academicReports(): AcademicReportsResource
    {
        return new AcademicReportsResource($this->connector);
    }
}
