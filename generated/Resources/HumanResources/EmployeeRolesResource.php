<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\AddEmployeeRoleRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\GetEmployeeRolesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\RemoveEmployeeRoleRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeRolesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\AddEmployeeRoleRequest
     */
    public function add(int $employeeId, int $roleId): Created
    {
        return $this->fetch(new AddEmployeeRoleRequest(employeeId: $employeeId, roleId: $roleId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Role>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\GetEmployeeRolesRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeRolesRequest(employeeId: $employeeId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\RemoveEmployeeRoleRequest
     */
    public function remove(int $employeeId, int $roleId): bool
    {
        $this->fetch(new RemoveEmployeeRoleRequest(employeeId: $employeeId, roleId: $roleId));

        return true;
    }
}
