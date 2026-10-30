<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Estates\BuildingForCreate;
use spkm\IsamsApi\Data\Estates\BuildingForUpdate;
use spkm\IsamsApi\Requests\Estates\Buildings\CreateBuildingRequest;
use spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingRequest;
use spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingsRequest;
use spkm\IsamsApi\Requests\Estates\Buildings\UpdateBuildingRequest;

class BuildingsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetBuildingsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\BuildingForCreate|array<string, mixed>  $building
     */
    public function create(BuildingForCreate|array $building): Response
    {
        return $this->connector->send(new CreateBuildingRequest($building));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetBuildingRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\BuildingForUpdate|array<string, mixed>  $building
     */
    public function update(int $id, BuildingForUpdate|array $building): Response
    {
        return $this->connector->send(new UpdateBuildingRequest($id, $building));
    }
}
