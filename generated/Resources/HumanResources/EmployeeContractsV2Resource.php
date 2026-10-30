<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\ContractForCreate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\CreateEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\DeleteEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\GetEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2\PatchEmployeeContractRequest;
use spkm\IsamsApi\Support\JsonPatch;

class EmployeeContractsV2Resource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ContractForCreate|array<string, mixed>  $command
     */
    public function createEmployeeContract(int $employeeId, ContractForCreate|array $command): Response
    {
        return $this->connector->send(new CreateEmployeeContractRequest($employeeId, $command));
    }

    public function deleteEmployeeContract(int $employeeId, int $contractId): Response
    {
        return $this->connector->send(new DeleteEmployeeContractRequest($employeeId, $contractId));
    }

    public function getEmployeeContract(int $employeeId, int $contractId): Response
    {
        return $this->connector->send(new GetEmployeeContractRequest($employeeId, $contractId));
    }

    public function getEmployeeContracts(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeContractsRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchEmployeeContract(int $employeeId, int $contractId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchEmployeeContractRequest($employeeId, $contractId, $patch));
    }
}
