<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Estates\Building;
use spkm\IsamsApi\Data\Estates\BuildingForCreate;
use spkm\IsamsApi\Data\Estates\BuildingForUpdate;
use spkm\IsamsApi\Requests\Estates\Buildings\CreateBuildingRequest;
use spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingRequest;
use spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingsRequest;
use spkm\IsamsApi\Requests\Estates\Buildings\UpdateBuildingRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class BuildingsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Estates\Building>
     * @see \spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetBuildingsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\BuildingForCreate|array<string, mixed>  $building
     * @see \spkm\IsamsApi\Requests\Estates\Buildings\CreateBuildingRequest
     */
    public function create(BuildingForCreate|array $building): Created
    {
        return $this->fetch(new CreateBuildingRequest(building: $building));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingRequest
     */
    public function get(int $id): Building
    {
        return $this->fetch(new GetBuildingRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Estates\BuildingForUpdate|array<string, mixed>  $building
     * @see \spkm\IsamsApi\Requests\Estates\Buildings\UpdateBuildingRequest
     */
    public function update(int $id, BuildingForUpdate|array $building): bool
    {
        $this->fetch(new UpdateBuildingRequest(id: $id, building: $building));

        return true;
    }
}
