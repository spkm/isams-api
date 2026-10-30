<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an identity check.
 *
 * DELETE /api/humanresources/employees/{employeeId}/identitychecks/{identityCheckId}
 */
class DeleteEmployeeIdentityCheckRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
