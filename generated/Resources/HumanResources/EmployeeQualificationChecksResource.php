<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\CreateEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\DeleteEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\GetEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\GetEmployeeQualificationChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\UpdateEmployeeQualificationCheckRequest;

class EmployeeQualificationChecksResource extends BaseResource
{
    public function all(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeQualificationChecksRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForCreate|array<string, mixed>  $employeeQualificationCheck
     */
    public function create(
        int $employeeId,
        EmployeeQualificationCheckForCreate|array $employeeQualificationCheck,
    ): Response {
        return $this->connector->send(new CreateEmployeeQualificationCheckRequest($employeeId, $employeeQualificationCheck));
    }

    public function delete(int $employeeId, int $qualificationCheckId): Response
    {
        return $this->connector->send(new DeleteEmployeeQualificationCheckRequest($employeeId, $qualificationCheckId));
    }

    public function get(int $employeeId, int $qualificationCheckId): Response
    {
        return $this->connector->send(new GetEmployeeQualificationCheckRequest($employeeId, $qualificationCheckId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForUpdate|array<string, mixed>  $employeeQualificationCheck
     */
    public function update(
        int $employeeId,
        int $qualificationCheckId,
        EmployeeQualificationCheckForUpdate|array $employeeQualificationCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeQualificationCheckRequest($employeeId, $qualificationCheckId, $employeeQualificationCheck));
    }
}
