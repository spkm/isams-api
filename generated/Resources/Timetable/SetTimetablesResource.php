<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Timetable\SetTimetables\GetSetTimetableRequest;

class SetTimetablesResource extends BaseResource
{
    public function getSetTimetable(int $setId): Response
    {
        return $this->connector->send(new GetSetTimetableRequest($setId));
    }
}
