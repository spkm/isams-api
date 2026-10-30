<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\BuildingDivisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Estates\Division;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all divisions associated with a building.
 *
 * GET /api/estates/buildings/{buildingId}/divisions
 */
class GetBuildingDivisionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Division::class;
    public string $resultKey = 'divisions';
    protected bool $cacheable = true;

    public function __construct(
        protected int $buildingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings/'.rawurlencode((string) $this->buildingId).'/divisions';
    }
}
