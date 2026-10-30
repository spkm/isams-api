<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\AddEmployeeRoleRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\GetEmployeeRolesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeRoles\RemoveEmployeeRoleRequest;

class EmployeeRolesResource extends BaseResource
{
    public function addEmployeeRole(int $employeeId, int $roleId): Response
    {
        return $this->connector->send(new AddEmployeeRoleRequest($employeeId, $roleId));
    }

    public function getEmployeeRoles(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeRolesRequest($employeeId));
    }

    public function removeEmployeeRole(int $employeeId, int $roleId): Response
    {
        return $this->connector->send(new RemoveEmployeeRoleRequest($employeeId, $roleId));
    }
}
