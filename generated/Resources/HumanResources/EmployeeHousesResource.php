<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\EmployeeHouses;
use spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\AddEmployeeHouseRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\GetEmployeeHousesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\RemoveEmployeeHouseRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeHousesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\AddEmployeeHouseRequest
     */
    public function add(int $employeeId, int $houseId): Created
    {
        return $this->fetch(new AddEmployeeHouseRequest(employeeId: $employeeId, houseId: $houseId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\GetEmployeeHousesRequest
     */
    public function all(int $employeeId): EmployeeHouses
    {
        return $this->fetch(new GetEmployeeHousesRequest(employeeId: $employeeId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeHouses\RemoveEmployeeHouseRequest
     */
    public function remove(int $employeeId, int $houseId): bool
    {
        $this->fetch(new RemoveEmployeeHouseRequest(employeeId: $employeeId, houseId: $houseId));

        return true;
    }
}
