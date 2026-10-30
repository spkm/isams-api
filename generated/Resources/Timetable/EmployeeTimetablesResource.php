<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Timetable\EmployeeTimetables\GetEmployeeTimetableRequest;

class EmployeeTimetablesResource extends BaseResource
{
    public function get(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeTimetableRequest($employeeId));
    }
}
