<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Rooms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Estates\Room;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all rooms.
 *
 * GET /api/estates/rooms
 */
class GetRoomsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Room::class;
    public string $resultKey = 'rooms';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/estates/rooms';
    }
}
