<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\RoleEmployees;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Employee;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all employees associated with a role.
 *
 * GET /api/humanresources/roles/{roleId}/employees
 */
class GetRoleEmployeesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Employee::class;
    public string $resultKey = 'employees';

    public function __construct(
        protected int $roleId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roles/'.rawurlencode((string) $this->roleId).'/employees';
    }
}
