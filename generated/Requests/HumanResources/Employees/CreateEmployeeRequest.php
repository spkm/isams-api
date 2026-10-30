<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Employees;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an employee.
 *
 * POST /api/humanresources/employees
 */
class CreateEmployeeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeForCreate|array<string, mixed>  $employee
     */
    public function __construct(
        protected EmployeeForCreate|array $employee,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employee instanceof Data ? $this->employee->toArray() : $this->employee;
    }
}
