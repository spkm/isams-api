<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a right to work check for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/righttoworkchecks/{rightToWorkCheckId}
 */
class UpdateEmployeeRightToWorkCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForUpdate|array<string, mixed>  $employeeRightToWorkCheck
     */
    public function __construct(
        protected int $employeeId,
        protected int $rightToWorkCheckId,
        protected EmployeeRightToWorkCheckForUpdate|array $employeeRightToWorkCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/righttoworkchecks/'.rawurlencode((string) $this->rightToWorkCheckId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeRightToWorkCheck instanceof Data ? $this->employeeRightToWorkCheck->toArray() : $this->employeeRightToWorkCheck;
    }
}
