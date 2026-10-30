<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\BuildingDivisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Disassociates a division from a building.
 *
 * DELETE /api/estates/buildings/{buildingId}/divisions/{divisionId}
 */
class RemoveBuildingDivisionRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
