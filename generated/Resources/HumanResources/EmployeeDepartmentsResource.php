<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\AddEmployeeDepartmentRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\GetEmployeeDepartmentsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\RemoveEmployeeDepartmentRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeDepartmentsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\AddEmployeeDepartmentRequest
     */
    public function add(int $employeeId, string $departmentType, int $departmentId): Created
    {
        return $this->fetch(new AddEmployeeDepartmentRequest(employeeId: $employeeId, departmentType: $departmentType, departmentId: $departmentId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Department>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\GetEmployeeDepartmentsRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeDepartmentsRequest(employeeId: $employeeId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\RemoveEmployeeDepartmentRequest
     */
    public function remove(int $employeeId, string $departmentType, int $departmentId): void
    {
        $this->fetch(new RemoveEmployeeDepartmentRequest(employeeId: $employeeId, departmentType: $departmentType, departmentId: $departmentId));
    }
}
