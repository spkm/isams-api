<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\CreateEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\UpdateEmployeeContractRequest;

class EmployeeContractsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate|array<string, mixed>  $contract
     */
    public function createEmployeeContract(int $employeeId, EmployeeContractForCreate|array $contract): Response
    {
        return $this->connector->send(new CreateEmployeeContractRequest($employeeId, $contract));
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
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate|array<string, mixed>  $employeeContract
     */
    public function updateEmployeeContract(
        int $employeeId,
        int $contractId,
        EmployeeContractForUpdate|array $employeeContract,
    ): Response {
        return $this->connector->send(new UpdateEmployeeContractRequest($employeeId, $contractId, $employeeContract));
    }
}
