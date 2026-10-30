<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\AddEmployeeHouseRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\GetEmployeeHousesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\RemoveEmployeeHouseRequest;

class EmployeeHousesResource extends BaseResource
{
    public function add(int $employeeId, int $houseId): Response
    {
        return $this->connector->send(new AddEmployeeHouseRequest($employeeId, $houseId));
    }

    public function all(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeHousesRequest($employeeId));
    }

    public function remove(int $employeeId, int $houseId): Response
    {
        return $this->connector->send(new RemoveEmployeeHouseRequest($employeeId, $houseId));
    }
}
