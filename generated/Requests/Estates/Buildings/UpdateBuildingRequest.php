<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Buildings;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Estates\BuildingForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a building.
 *
 * PUT /api/estates/buildings/{id}
 */
class UpdateBuildingRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Estates\BuildingForUpdate|array<string, mixed>  $building
     */
    public function __construct(
        protected int $id,
        protected BuildingForUpdate|array $building,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->building instanceof Data ? $this->building->toArray() : $this->building;
    }
}
