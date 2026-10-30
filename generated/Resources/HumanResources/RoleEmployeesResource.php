<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\AddRoleEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\GetRoleEmployeesRequest;
use spkm\IsamsApi\Requests\HumanResources\RoleEmployees\RemoveRoleEmployeeRequest;

class RoleEmployeesResource extends BaseResource
{
    public function addRoleEmployee(int $roleId, int $employeeId): Response
    {
        return $this->connector->send(new AddRoleEmployeeRequest($roleId, $employeeId));
    }

    public function getRoleEmployees(int $roleId): Response
    {
        return $this->connector->send(new GetRoleEmployeesRequest($roleId));
    }

    public function removeRoleEmployee(int $roleId, int $employeeId): Response
    {
        return $this->connector->send(new RemoveRoleEmployeeRequest($roleId, $employeeId));
    }
}
