<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\EmployeeContracts;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\CreateEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\UpdateEmployeeContractRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class V1Resource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeContract>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractsRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeContractsRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate|array<string, mixed>  $employeeContract
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\CreateEmployeeContractRequest
     */
    public function create(int $employeeId, EmployeeContractForCreate|array $employeeContract): Created
    {
        return $this->fetch(new CreateEmployeeContractRequest(employeeId: $employeeId, employeeContract: $employeeContract));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeContract>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractRequest
     */
    public function get(int $employeeId, int $contractId): Collection
    {
        return $this->fetch(new GetEmployeeContractRequest(employeeId: $employeeId, contractId: $contractId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate|array<string, mixed>  $employeeContract
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\UpdateEmployeeContractRequest
     */
    public function update(int $employeeId, int $contractId, EmployeeContractForUpdate|array $employeeContract): void
    {
        $this->fetch(new UpdateEmployeeContractRequest(employeeId: $employeeId, contractId: $contractId, employeeContract: $employeeContract));
    }
}
