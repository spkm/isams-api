<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a right to work check for an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/righttoworkchecks
 */
class CreateEmployeeRightToWorkCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheckForCreate|array<string, mixed>  $employeeRightToWorkCheck
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeRightToWorkCheckForCreate|array $employeeRightToWorkCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/righttoworkchecks';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeRightToWorkCheck instanceof Data ? $this->employeeRightToWorkCheck->toArray() : $this->employeeRightToWorkCheck;
    }
}
