<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\HumanResources\EmployeeForCreate;
use spkm\IsamsApi\Data\HumanResources\EmployeeForUpdate;
use spkm\IsamsApi\Requests\HumanResources\Employees\CreateEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeByUserCodeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeeRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\GetEmployeesRequest;
use spkm\IsamsApi\Requests\HumanResources\Employees\UpdateEmployeeRequest;

class EmployeesResource extends BaseResource
{
    public function all(
        ?int $page = null,
        ?int $pageSize = null,
        ?string $expand = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetEmployeesRequest($page, $pageSize, $expand, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeForCreate|array<string, mixed>  $employee
     */
    public function create(EmployeeForCreate|array $employee): Response
    {
        return $this->connector->send(new CreateEmployeeRequest($employee));
    }

    public function get(int $id, ?string $expand = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetEmployeeRequest($id, $expand, $filter));
    }

    public function getByUserCode(string $userCode): Response
    {
        return $this->connector->send(new GetEmployeeByUserCodeRequest($userCode));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeForUpdate|array<string, mixed>  $employee
     */
    public function update(int $id, EmployeeForUpdate|array $employee): Response
    {
        return $this->connector->send(new UpdateEmployeeRequest($id, $employee));
    }
}
