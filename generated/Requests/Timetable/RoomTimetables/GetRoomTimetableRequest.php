<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\RoomTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\RoomTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a room's timetable.
 *
 * GET /api/timetables/rooms/{roomId}
 */
class GetRoomTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = RoomTimetable::class;

    public function __construct(
        protected int $roomId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/rooms/'.rawurlencode((string) $this->roomId);
    }
}
