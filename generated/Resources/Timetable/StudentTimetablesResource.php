<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\StudentTimetable;
use spkm\IsamsApi\Requests\Timetable\StudentTimetables\GetStudentTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\StudentTimetables\GetStudentTimetableRequest
     */
    public function get(string $schoolId): StudentTimetable
    {
        return $this->fetch(new GetStudentTimetableRequest(schoolId: $schoolId));
    }
}
