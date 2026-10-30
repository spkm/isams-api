<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Rooms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Estates\RoomForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a room.
 *
 * POST /api/estates/rooms
 */
class CreateRoomRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Estates\RoomForCreate|array<string, mixed>  $room
     */
    public function __construct(
        protected RoomForCreate|array $room,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/rooms';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->room instanceof Data ? $this->room->toArray() : $this->room;
    }
}
