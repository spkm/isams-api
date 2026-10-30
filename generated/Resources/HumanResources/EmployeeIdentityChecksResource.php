<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\CreateEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\DeleteEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\GetEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\GetEmployeeIdentityChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\UpdateEmployeeIdentityCheckRequest;

class EmployeeIdentityChecksResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForCreate|array<string, mixed>  $employeeIdentityCheck
     */
    public function createEmployeeIdentityCheck(
        int $employeeId,
        EmployeeIdentityCheckForCreate|array $employeeIdentityCheck,
    ): Response {
        return $this->connector->send(new CreateEmployeeIdentityCheckRequest($employeeId, $employeeIdentityCheck));
    }

    public function deleteEmployeeIdentityCheck(int $employeeId, int $identityCheckId): Response
    {
        return $this->connector->send(new DeleteEmployeeIdentityCheckRequest($employeeId, $identityCheckId));
    }

    public function getEmployeeIdentityCheck(int $employeeId, int $identityCheckId): Response
    {
        return $this->connector->send(new GetEmployeeIdentityCheckRequest($employeeId, $identityCheckId));
    }

    public function getEmployeeIdentityChecks(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeIdentityChecksRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForUpdate|array<string, mixed>  $employeeIdentityCheck
     */
    public function updateEmployeeIdentityCheck(
        int $employeeId,
        int $identityCheckId,
        EmployeeIdentityCheckForUpdate|array $employeeIdentityCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeIdentityCheckRequest($employeeId, $identityCheckId, $employeeIdentityCheck));
    }
}
