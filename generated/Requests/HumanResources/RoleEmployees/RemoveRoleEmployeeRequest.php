<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\RoleEmployees;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Disassociates an employee from a role.
 *
 * DELETE /api/humanresources/roles/{roleId}/employees/{employeeId}
 */
class RemoveRoleEmployeeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $roleId,
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roles/'.rawurlencode((string) $this->roleId).'/employees/'.rawurlencode((string) $this->employeeId);
    }
}
