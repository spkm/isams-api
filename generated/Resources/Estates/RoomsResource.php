<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Estates\RoomForCreate;
use spkm\IsamsApi\Data\Estates\RoomForUpdate;
use spkm\IsamsApi\Requests\Estates\Rooms\CreateRoomRequest;
use spkm\IsamsApi\Requests\Estates\Rooms\GetRoomRequest;
use spkm\IsamsApi\Requests\Estates\Rooms\GetRoomsRequest;
use spkm\IsamsApi\Requests\Estates\Rooms\UpdateRoomRequest;

class RoomsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetRoomsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\RoomForCreate|array<string, mixed>  $room
     */
    public function create(RoomForCreate|array $room): Response
    {
        return $this->connector->send(new CreateRoomRequest($room));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetRoomRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\RoomForUpdate|array<string, mixed>  $room
     */
    public function update(int $id, RoomForUpdate|array $room): Response
    {
        return $this->connector->send(new UpdateRoomRequest($id, $room));
    }
}
