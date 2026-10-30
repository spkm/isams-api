<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Rooms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Estates\RoomForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a room.
 *
 * PUT /api/estates/rooms/{id}
 */
class UpdateRoomRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Estates\RoomForUpdate|array<string, mixed>  $room
     */
    public function __construct(
        protected int $id,
        protected RoomForUpdate|array $room,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/rooms/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->room instanceof Data ? $this->room->toArray() : $this->room;
    }
}
