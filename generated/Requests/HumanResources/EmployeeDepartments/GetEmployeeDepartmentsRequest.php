<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeDepartments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Department;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all departments associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/departments
 */
class GetEmployeeDepartmentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Department::class;
    public string $resultKey = 'departments';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/departments';
    }
}
