<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\BuildingRooms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Estates\Room;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all rooms associated with a building.
 *
 * GET /api/estates/buildings/{buildingId}/rooms
 */
class GetBuildingRoomsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Room::class;
    public string $resultKey = 'rooms';
    protected bool $cacheable = true;

    public function __construct(
        protected int $buildingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings/'.rawurlencode((string) $this->buildingId).'/rooms';
    }
}
