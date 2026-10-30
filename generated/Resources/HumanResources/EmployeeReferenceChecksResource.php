<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\CreateEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\DeleteEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\GetEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\GetEmployeeReferenceChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\UpdateEmployeeReferenceCheckRequest;

class EmployeeReferenceChecksResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForCreate|array<string, mixed>  $employeeReferenceCheck
     */
    public function createEmployeeReferenceCheck(
        int $employeeId,
        EmployeeReferenceCheckForCreate|array $employeeReferenceCheck,
    ): Response {
        return $this->connector->send(new CreateEmployeeReferenceCheckRequest($employeeId, $employeeReferenceCheck));
    }

    public function deleteEmployeeReferenceCheck(int $employeeId, int $referenceCheckId): Response
    {
        return $this->connector->send(new DeleteEmployeeReferenceCheckRequest($employeeId, $referenceCheckId));
    }

    public function getEmployeeReferenceCheck(int $employeeId, int $referenceCheckId): Response
    {
        return $this->connector->send(new GetEmployeeReferenceCheckRequest($employeeId, $referenceCheckId));
    }

    public function getEmployeeReferenceChecks(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeReferenceChecksRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForUpdate|array<string, mixed>  $employeeReferenceCheck
     */
    public function updateEmployeeReferenceCheck(
        int $employeeId,
        int $referenceCheckId,
        EmployeeReferenceCheckForUpdate|array $employeeReferenceCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeReferenceCheckRequest($employeeId, $referenceCheckId, $employeeReferenceCheck));
    }
}
