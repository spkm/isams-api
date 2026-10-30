<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Timetable\StudentTimetables\GetStudentTimetableRequest;

class StudentTimetablesResource extends BaseResource
{
    public function get(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentTimetableRequest($schoolId));
    }
}
