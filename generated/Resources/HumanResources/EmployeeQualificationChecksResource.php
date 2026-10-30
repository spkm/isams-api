<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheck;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\CreateEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\DeleteEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\GetEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\GetEmployeeQualificationChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\UpdateEmployeeQualificationCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeQualificationChecksResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheck>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\GetEmployeeQualificationChecksRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeQualificationChecksRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForCreate|array<string, mixed>  $employeeQualificationCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\CreateEmployeeQualificationCheckRequest
     */
    public function create(
        int $employeeId,
        EmployeeQualificationCheckForCreate|array $employeeQualificationCheck,
    ): Created {
        return $this->fetch(new CreateEmployeeQualificationCheckRequest(employeeId: $employeeId, employeeQualificationCheck: $employeeQualificationCheck));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\DeleteEmployeeQualificationCheckRequest
     */
    public function delete(int $employeeId, int $qualificationCheckId): bool
    {
        $this->fetch(new DeleteEmployeeQualificationCheckRequest(employeeId: $employeeId, qualificationCheckId: $qualificationCheckId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\GetEmployeeQualificationCheckRequest
     */
    public function get(int $employeeId, int $qualificationCheckId): EmployeeQualificationCheck
    {
        return $this->fetch(new GetEmployeeQualificationCheckRequest(employeeId: $employeeId, qualificationCheckId: $qualificationCheckId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForUpdate|array<string, mixed>  $employeeQualificationCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks\UpdateEmployeeQualificationCheckRequest
     */
    public function update(
        int $employeeId,
        int $qualificationCheckId,
        EmployeeQualificationCheckForUpdate|array $employeeQualificationCheck,
    ): bool {
        $this->fetch(new UpdateEmployeeQualificationCheckRequest(employeeId: $employeeId, qualificationCheckId: $qualificationCheckId, employeeQualificationCheck: $employeeQualificationCheck));

        return true;
    }
}
