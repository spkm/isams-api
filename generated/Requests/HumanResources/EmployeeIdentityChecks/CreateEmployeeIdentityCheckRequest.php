<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an identity check.
 *
 * POST /api/humanresources/employees/{employeeId}/identitychecks
 */
class CreateEmployeeIdentityCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheckForCreate|array<string, mixed>  $employeeIdentityCheck
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeIdentityCheckForCreate|array $employeeIdentityCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/identitychecks';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeIdentityCheck instanceof Data ? $this->employeeIdentityCheck->toArray() : $this->employeeIdentityCheck;
    }
}
