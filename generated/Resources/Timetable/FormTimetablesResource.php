<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\FormTimetable;
use spkm\IsamsApi\Requests\Timetable\FormTimetables\GetFormTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FormTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\FormTimetables\GetFormTimetableRequest
     */
    public function get(string $formCode): FormTimetable
    {
        return $this->fetch(new GetFormTimetableRequest(formCode: $formCode));
    }
}
