<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\BuildingDivisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates a division with a building.
 *
 * POST /api/estates/buildings/{buildingId}/divisions/{divisionId}
 */
class AddBuildingDivisionRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $buildingId,
        protected int $divisionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings/'.rawurlencode((string) $this->buildingId).'/divisions/'.rawurlencode((string) $this->divisionId);
    }
}
