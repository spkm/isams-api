<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates a department with an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/departments/{departmentType}/{departmentId}
 */
class AddEmployeeDepartmentRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $employeeId,
        protected string $departmentType,
        protected int $departmentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/departments/'.rawurlencode((string) $this->departmentType).'/'.rawurlencode((string) $this->departmentId);
    }
}
