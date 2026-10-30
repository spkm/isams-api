<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\EmployeeTimetable;
use spkm\IsamsApi\Requests\Timetable\EmployeeTimetables\GetEmployeeTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\EmployeeTimetables\GetEmployeeTimetableRequest
     */
    public function get(int $employeeId): EmployeeTimetable
    {
        return $this->fetch(new GetEmployeeTimetableRequest(employeeId: $employeeId));
    }
}
