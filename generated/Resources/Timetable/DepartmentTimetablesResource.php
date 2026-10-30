<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Timetable\DepartmentTimetables\GetDepartmentTimetableRequest;

class DepartmentTimetablesResource extends BaseResource
{
    public function get(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentTimetableRequest($departmentId));
    }
}
