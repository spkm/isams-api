<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\RoleEmployees;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates an employee with a role.
 *
 * POST /api/humanresources/roles/{roleId}/employees/{employeeId}
 */
class AddRoleEmployeeRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

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
