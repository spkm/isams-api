<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an identity check.
 *
 * PUT /api/humanresources/employees/{employeeId}/identitychecks/{identityCheckId}
 */
class UpdateEmployeeIdentityCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForUpdate|array<string, mixed>  $employeeIdentityCheck
     */
    public function __construct(
        protected int $employeeId,
        protected int $identityCheckId,
        protected EmployeeIdentityCheckForUpdate|array $employeeIdentityCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/identitychecks/'.rawurlencode((string) $this->identityCheckId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeIdentityCheck instanceof Data ? $this->employeeIdentityCheck->toArray() : $this->employeeIdentityCheck;
    }
}
