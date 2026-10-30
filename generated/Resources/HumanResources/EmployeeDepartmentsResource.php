<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\AddEmployeeDepartmentRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\GetEmployeeDepartmentsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments\RemoveEmployeeDepartmentRequest;

class EmployeeDepartmentsResource extends BaseResource
{
    public function add(int $employeeId, string $departmentType, int $departmentId): Response
    {
        return $this->connector->send(new AddEmployeeDepartmentRequest($employeeId, $departmentType, $departmentId));
    }

    public function all(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeDepartmentsRequest($employeeId));
    }

    public function remove(int $employeeId, string $departmentType, int $departmentId): Response
    {
        return $this->connector->send(new RemoveEmployeeDepartmentRequest($employeeId, $departmentType, $departmentId));
    }
}
