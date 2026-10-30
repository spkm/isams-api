<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Estates\Room;
use spkm\IsamsApi\Data\Estates\RoomForCreate;
use spkm\IsamsApi\Data\Estates\RoomForUpdate;
use spkm\IsamsApi\Requests\Estates\Rooms\CreateRoomRequest;
use spkm\IsamsApi\Requests\Estates\Rooms\GetRoomRequest;
use spkm\IsamsApi\Requests\Estates\Rooms\GetRoomsRequest;
use spkm\IsamsApi\Requests\Estates\Rooms\UpdateRoomRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RoomsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Estates\Room>
     * @see \spkm\IsamsApi\Requests\Estates\Rooms\GetRoomsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetRoomsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\RoomForCreate|array<string, mixed>  $room
     * @see \spkm\IsamsApi\Requests\Estates\Rooms\CreateRoomRequest
     */
    public function create(RoomForCreate|array $room): Created
    {
        return $this->fetch(new CreateRoomRequest(room: $room));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Estates\Rooms\GetRoomRequest
     */
    public function get(int $id): Room
    {
        return $this->fetch(new GetRoomRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\RoomForUpdate|array<string, mixed>  $room
     * @see \spkm\IsamsApi\Requests\Estates\Rooms\UpdateRoomRequest
     */
    public function update(int $id, RoomForUpdate|array $room): bool
    {
        $this->fetch(new UpdateRoomRequest(id: $id, room: $room));

        return true;
    }
}
