<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheck;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\CreateEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\DeleteEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\GetEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\GetEmployeeIdentityChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\UpdateEmployeeIdentityCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeIdentityChecksResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheck>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\GetEmployeeIdentityChecksRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeIdentityChecksRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForCreate|array<string, mixed>  $employeeIdentityCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\CreateEmployeeIdentityCheckRequest
     */
    public function create(int $employeeId, EmployeeIdentityCheckForCreate|array $employeeIdentityCheck): Created
    {
        return $this->fetch(new CreateEmployeeIdentityCheckRequest(employeeId: $employeeId, employeeIdentityCheck: $employeeIdentityCheck));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\DeleteEmployeeIdentityCheckRequest
     */
    public function delete(int $employeeId, int $identityCheckId): bool
    {
        $this->fetch(new DeleteEmployeeIdentityCheckRequest(employeeId: $employeeId, identityCheckId: $identityCheckId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\GetEmployeeIdentityCheckRequest
     */
    public function get(int $employeeId, int $identityCheckId): EmployeeIdentityCheck
    {
        return $this->fetch(new GetEmployeeIdentityCheckRequest(employeeId: $employeeId, identityCheckId: $identityCheckId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForUpdate|array<string, mixed>  $employeeIdentityCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks\UpdateEmployeeIdentityCheckRequest
     */
    public function update(
        int $employeeId,
        int $identityCheckId,
        EmployeeIdentityCheckForUpdate|array $employeeIdentityCheck,
    ): bool {
        $this->fetch(new UpdateEmployeeIdentityCheckRequest(employeeId: $employeeId, identityCheckId: $identityCheckId, employeeIdentityCheck: $employeeIdentityCheck));

        return true;
    }
}
