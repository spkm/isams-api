<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRoles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Role;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all roles associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/roles
 */
class GetEmployeeRolesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Role::class;
    public string $resultKey = 'roles';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/roles';
    }
}
