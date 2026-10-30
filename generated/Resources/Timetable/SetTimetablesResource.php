<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\SetTimetable;
use spkm\IsamsApi\Requests\Timetable\SetTimetables\GetSetTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SetTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\SetTimetables\GetSetTimetableRequest
     */
    public function get(int $setId): SetTimetable
    {
        return $this->fetch(new GetSetTimetableRequest(setId: $setId));
    }
}
