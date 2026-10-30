<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\DepartmentEmployees;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Employee;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all employees associated with a department.
 *
 * GET /api/school/departments/{departmentType}/{departmentId}/employees
 */
class GetDepartmentEmployeesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Employee::class;
    public string $resultKey = 'employees';

    public function __construct(
        protected string $departmentType,
        protected int $departmentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/departments/'.rawurlencode((string) $this->departmentType).'/'.rawurlencode((string) $this->departmentId).'/employees';
    }
}
