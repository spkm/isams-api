<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Estates\BuildingDivisions\AddBuildingDivisionRequest;
use spkm\IsamsApi\Requests\Estates\BuildingDivisions\GetBuildingDivisionsRequest;
use spkm\IsamsApi\Requests\Estates\BuildingDivisions\RemoveBuildingDivisionRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class BuildingDivisionsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Estates\BuildingDivisions\AddBuildingDivisionRequest
     */
    public function add(int $buildingId, int $divisionId): Created
    {
        return $this->fetch(new AddBuildingDivisionRequest(buildingId: $buildingId, divisionId: $divisionId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Estates\Division>
     * @see \spkm\IsamsApi\Requests\Estates\BuildingDivisions\GetBuildingDivisionsRequest
     */
    public function all(int $buildingId): Collection
    {
        return $this->fetch(new GetBuildingDivisionsRequest(buildingId: $buildingId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Estates\BuildingDivisions\RemoveBuildingDivisionRequest
     */
    public function remove(int $buildingId, int $divisionId): bool
    {
        $this->fetch(new RemoveBuildingDivisionRequest(buildingId: $buildingId, divisionId: $divisionId));

        return true;
    }
}
