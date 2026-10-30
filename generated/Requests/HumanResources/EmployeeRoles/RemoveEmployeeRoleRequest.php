<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRoles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Disassociates a role from an employee.
 *
 * DELETE /api/humanresources/employees/{employeeId}/roles/{roleId}
 */
class RemoveEmployeeRoleRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $employeeId,
        protected int $roleId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/roles/'.rawurlencode((string) $this->roleId);
    }
}
