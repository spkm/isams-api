<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\Employee;
use spkm\IsamsApi\Data\HumanResources\EmployeeForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeForUpdate;
use spkm\IsamsApi\Requests\HumanResources\Employees\CreateEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeByUserCodeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeesRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\UpdateEmployeeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\HumanResources\Employee>
     * @see \spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeesRequest
     */
    public function all(?string $expand = null, string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetEmployeesRequest(expand: $expand, filter: $filter), Employee::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeForCreate|array<string, mixed>  $employee
     * @see \spkm\IsamsApi\Requests\HumanResources\Employees\CreateEmployeeRequest
     */
    public function create(EmployeeForCreate|array $employee): Created
    {
        return $this->fetch(new CreateEmployeeRequest(employee: $employee));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeRequest
     */
    public function get(int $id, ?string $expand = null, string|Stringable|null $filter = null): Employee
    {
        return $this->fetch(new GetEmployeeRequest(id: $id, expand: $expand, filter: $filter));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeByUserCodeRequest
     */
    public function getByUserCode(string $userCode): Employee
    {
        return $this->fetch(new GetEmployeeByUserCodeRequest(userCode: $userCode));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeForUpdate|array<string, mixed>  $employee
     * @see \spkm\IsamsApi\Requests\HumanResources\Employees\UpdateEmployeeRequest
     */
    public function update(int $id, EmployeeForUpdate|array $employee): void
    {
        $this->fetch(new UpdateEmployeeRequest(id: $id, employee: $employee));
    }
}
