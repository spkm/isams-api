<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\Contract;
use spkm\IsamsApi\Data\HumanResources\ContractForCreate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\CreateEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\DeleteEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\PatchEmployeeContractRequest;
use spkm\IsamsApi\Resources\HumanResources\EmployeeContracts\V1Resource;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class EmployeeContractsResource extends IsamsResource
{
    public function v1(): V1Resource
    {
        return new V1Resource($this->connector);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Contract>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractsRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeContractsRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ContractForCreate|array<string, mixed>  $contract
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\CreateEmployeeContractRequest
     */
    public function create(int $employeeId, ContractForCreate|array $contract): Created
    {
        return $this->fetch(new CreateEmployeeContractRequest(employeeId: $employeeId, contract: $contract));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\DeleteEmployeeContractRequest
     */
    public function delete(int $employeeId, int $contractId): bool
    {
        $this->fetch(new DeleteEmployeeContractRequest(employeeId: $employeeId, contractId: $contractId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractRequest
     */
    public function get(int $employeeId, int $contractId): Contract
    {
        return $this->fetch(new GetEmployeeContractRequest(employeeId: $employeeId, contractId: $contractId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\PatchEmployeeContractRequest
     */
    public function patch(int $employeeId, int $contractId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchEmployeeContractRequest(employeeId: $employeeId, contractId: $contractId, patch: $patch));

        return true;
    }
}
