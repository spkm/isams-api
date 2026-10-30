<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Buildings;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Estates\BuildingForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a building.
 *
 * POST /api/estates/buildings
 */
class CreateBuildingRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Estates\BuildingForCreate|array<string, mixed>  $building
     */
    public function __construct(
        protected BuildingForCreate|array $building,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->building instanceof Data ? $this->building->toArray() : $this->building;
    }
}
