<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheck;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\CreateEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\DeleteEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\GetEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\GetEmployeeReferenceChecksRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\UpdateEmployeeReferenceCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeReferenceChecksResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheck>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\GetEmployeeReferenceChecksRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeReferenceChecksRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForCreate|array<string, mixed>  $employeeReferenceCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\CreateEmployeeReferenceCheckRequest
     */
    public function create(int $employeeId, EmployeeReferenceCheckForCreate|array $employeeReferenceCheck): Created
    {
        return $this->fetch(new CreateEmployeeReferenceCheckRequest(employeeId: $employeeId, employeeReferenceCheck: $employeeReferenceCheck));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\DeleteEmployeeReferenceCheckRequest
     */
    public function delete(int $employeeId, int $referenceCheckId): bool
    {
        $this->fetch(new DeleteEmployeeReferenceCheckRequest(employeeId: $employeeId, referenceCheckId: $referenceCheckId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\GetEmployeeReferenceCheckRequest
     */
    public function get(int $employeeId, int $referenceCheckId): EmployeeReferenceCheck
    {
        return $this->fetch(new GetEmployeeReferenceCheckRequest(employeeId: $employeeId, referenceCheckId: $referenceCheckId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForUpdate|array<string, mixed>  $employeeReferenceCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks\UpdateEmployeeReferenceCheckRequest
     */
    public function update(
        int $employeeId,
        int $referenceCheckId,
        EmployeeReferenceCheckForUpdate|array $employeeReferenceCheck,
    ): bool {
        $this->fetch(new UpdateEmployeeReferenceCheckRequest(employeeId: $employeeId, referenceCheckId: $referenceCheckId, employeeReferenceCheck: $employeeReferenceCheck));

        return true;
    }
}
