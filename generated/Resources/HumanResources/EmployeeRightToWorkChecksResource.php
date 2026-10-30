<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\CreateEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\DeleteEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\GetEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\GetEmployeeRightToWorkChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\UpdateEmployeeRightToWorkCheckRequest;

class EmployeeRightToWorkChecksResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForCreate|array<string, mixed>  $employeeRightToWorkCheck
     */
    public function createEmployeeRightToWorkCheck(
        int $employeeId,
        EmployeeRightToWorkCheckForCreate|array $employeeRightToWorkCheck,
    ): Response {
        return $this->connector->send(new CreateEmployeeRightToWorkCheckRequest($employeeId, $employeeRightToWorkCheck));
    }

    public function deleteEmployeeRightToWorkCheck(int $employeeId, int $rightToWorkCheckId): Response
    {
        return $this->connector->send(new DeleteEmployeeRightToWorkCheckRequest($employeeId, $rightToWorkCheckId));
    }

    public function getEmployeeRightToWorkCheck(int $employeeId, int $rightToWorkCheckId): Response
    {
        return $this->connector->send(new GetEmployeeRightToWorkCheckRequest($employeeId, $rightToWorkCheckId));
    }

    public function getEmployeeRightToWorkChecks(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeRightToWorkChecksRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForUpdate|array<string, mixed>  $employeeRightToWorkCheck
     */
    public function updateEmployeeRightToWorkCheck(
        int $employeeId,
        int $rightToWorkCheckId,
        EmployeeRightToWorkCheckForUpdate|array $employeeRightToWorkCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeRightToWorkCheckRequest($employeeId, $rightToWorkCheckId, $employeeRightToWorkCheck));
    }
}
