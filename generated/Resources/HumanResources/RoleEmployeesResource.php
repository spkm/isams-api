<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\AddRoleEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\GetRoleEmployeesRequest;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\RemoveRoleEmployeeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RoleEmployeesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\RoleEmployees\AddRoleEmployeeRequest
     */
    public function add(int $roleId, int $employeeId): Created
    {
        return $this->fetch(new AddRoleEmployeeRequest(roleId: $roleId, employeeId: $employeeId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Employee>
     * @see \spkm\IsamsApi\Requests\HumanResources\RoleEmployees\GetRoleEmployeesRequest
     */
    public function all(int $roleId): Collection
    {
        return $this->fetch(new GetRoleEmployeesRequest(roleId: $roleId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\RoleEmployees\RemoveRoleEmployeeRequest
     */
    public function remove(int $roleId, int $employeeId): void
    {
        $this->fetch(new RemoveRoleEmployeeRequest(roleId: $roleId, employeeId: $employeeId));
    }
}
