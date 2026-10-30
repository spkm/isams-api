<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\ContractForCreate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\CreateEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\DeleteEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\PatchEmployeeContractRequest;
use spkm\IsamsApi\Resources\HumanResources\EmployeeContracts\V1Resource;
use spkm\IsamsApi\Support\JsonPatch;

class EmployeeContractsResource extends BaseResource
{
    public function v1(): V1Resource
    {
        return new V1Resource($this->connector);
    }

    public function all(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeContractsRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ContractForCreate|array<string, mixed>  $contract
     */
    public function create(int $employeeId, ContractForCreate|array $contract): Response
    {
        return $this->connector->send(new CreateEmployeeContractRequest($employeeId, $contract));
    }

    public function delete(int $employeeId, int $contractId): Response
    {
        return $this->connector->send(new DeleteEmployeeContractRequest($employeeId, $contractId));
    }

    public function get(int $employeeId, int $contractId): Response
    {
        return $this->connector->send(new GetEmployeeContractRequest($employeeId, $contractId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $employeeId, int $contractId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchEmployeeContractRequest($employeeId, $contractId, $patch));
    }
}
