<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheck;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\CreateEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\DeleteEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\GetEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\GetEmployeeRightToWorkChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\UpdateEmployeeRightToWorkCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeRightToWorkChecksResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheck>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\GetEmployeeRightToWorkChecksRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeRightToWorkChecksRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForCreate|array<string, mixed>  $employeeRightToWorkCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\CreateEmployeeRightToWorkCheckRequest
     */
    public function create(
        int $employeeId,
        EmployeeRightToWorkCheckForCreate|array $employeeRightToWorkCheck,
    ): Created {
        return $this->fetch(new CreateEmployeeRightToWorkCheckRequest(employeeId: $employeeId, employeeRightToWorkCheck: $employeeRightToWorkCheck));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\DeleteEmployeeRightToWorkCheckRequest
     */
    public function delete(int $employeeId, int $rightToWorkCheckId): void
    {
        $this->fetch(new DeleteEmployeeRightToWorkCheckRequest(employeeId: $employeeId, rightToWorkCheckId: $rightToWorkCheckId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\GetEmployeeRightToWorkCheckRequest
     */
    public function get(int $employeeId, int $rightToWorkCheckId): EmployeeRightToWorkCheck
    {
        return $this->fetch(new GetEmployeeRightToWorkCheckRequest(employeeId: $employeeId, rightToWorkCheckId: $rightToWorkCheckId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForUpdate|array<string, mixed>  $employeeRightToWorkCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks\UpdateEmployeeRightToWorkCheckRequest
     */
    public function update(
        int $employeeId,
        int $rightToWorkCheckId,
        EmployeeRightToWorkCheckForUpdate|array $employeeRightToWorkCheck,
    ): void {
        $this->fetch(new UpdateEmployeeRightToWorkCheckRequest(employeeId: $employeeId, rightToWorkCheckId: $rightToWorkCheckId, employeeRightToWorkCheck: $employeeRightToWorkCheck));
    }
}
