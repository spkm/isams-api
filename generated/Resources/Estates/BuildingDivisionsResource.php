<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Estates;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Estates\BuildingDivisions\AddBuildingDivisionRequest;
use spkm\IsamsApi\Requests\Estates\BuildingDivisions\GetBuildingDivisionsRequest;
use spkm\IsamsApi\Requests\Estates\BuildingDivisions\RemoveBuildingDivisionRequest;

class BuildingDivisionsResource extends BaseResource
{
    public function addBuildingDivision(int $buildingId, int $divisionId): Response
    {
        return $this->connector->send(new AddBuildingDivisionRequest($buildingId, $divisionId));
    }

    public function getBuildingDivisions(int $buildingId): Response
    {
        return $this->connector->send(new GetBuildingDivisionsRequest($buildingId));
    }

    public function removeBuildingDivision(int $buildingId, int $divisionId): Response
    {
        return $this->connector->send(new RemoveBuildingDivisionRequest($buildingId, $divisionId));
    }
}
