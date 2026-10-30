<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Employees;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an employee.
 *
 * PUT /api/humanresources/employees/{id}
 */
class UpdateEmployeeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeForUpdate|array<string, mixed>  $employee
     */
    public function __construct(
        protected int $id,
        protected EmployeeForUpdate|array $employee,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employee instanceof Data ? $this->employee->toArray() : $this->employee;
    }
}
