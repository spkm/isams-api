<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\DepartmentTimetable;
use spkm\IsamsApi\Requests\Timetable\DepartmentTimetables\GetDepartmentTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DepartmentTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\DepartmentTimetables\GetDepartmentTimetableRequest
     */
    public function get(int $departmentId): DepartmentTimetable
    {
        return $this->fetch(new GetDepartmentTimetableRequest(departmentId: $departmentId));
    }
}
