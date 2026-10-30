<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an identity check associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/identitychecks/{identityCheckId}
 */
class GetEmployeeIdentityCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeIdentityCheck::class;

    public function __construct(
        protected int $employeeId,
        protected int $identityCheckId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/identitychecks/'.rawurlencode((string) $this->identityCheckId);
    }
}
