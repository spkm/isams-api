<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\EmployeeContracts;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\CreateEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\GetEmployeeContractsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1\UpdateEmployeeContractRequest;

class V1Resource extends BaseResource
{
    public function all(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeContractsRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate|array<string, mixed>  $employeeContract
     */
    public function create(int $employeeId, EmployeeContractForCreate|array $employeeContract): Response
    {
        return $this->connector->send(new CreateEmployeeContractRequest($employeeId, $employeeContract));
    }

    public function get(int $employeeId, int $contractId): Response
    {
        return $this->connector->send(new GetEmployeeContractRequest($employeeId, $contractId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate|array<string, mixed>  $employeeContract
     */
    public function update(
        int $employeeId,
        int $contractId,
        EmployeeContractForUpdate|array $employeeContract,
    ): Response {
        return $this->connector->send(new UpdateEmployeeContractRequest($employeeId, $contractId, $employeeContract));
    }
}
