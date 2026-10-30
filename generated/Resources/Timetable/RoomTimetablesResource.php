<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Timetable\RoomTimetable;
use spkm\IsamsApi\Requests\Timetable\RoomTimetables\GetRoomTimetableRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RoomTimetablesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\RoomTimetables\GetRoomTimetableRequest
     */
    public function get(int $roomId): RoomTimetable
    {
        return $this->fetch(new GetRoomTimetableRequest(roomId: $roomId));
    }
}
