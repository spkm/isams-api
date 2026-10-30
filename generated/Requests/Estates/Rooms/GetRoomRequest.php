<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Rooms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Estates\Room;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a room.
 *
 * GET /api/estates/rooms/{id}
 */
class GetRoomRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Room::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/rooms/'.rawurlencode((string) $this->id);
    }
}
