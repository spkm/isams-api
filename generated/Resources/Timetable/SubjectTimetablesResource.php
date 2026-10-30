<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\SubjectTimetable;
use spkm\IsamsApi\Requests\Timetable\SubjectTimetables\GetSubjectTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SubjectTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\SubjectTimetables\GetSubjectTimetableRequest
     */
    public function get(int $subjectId): SubjectTimetable
    {
        return $this->fetch(new GetSubjectTimetableRequest(subjectId: $subjectId));
    }
}
