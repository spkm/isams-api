<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a qualification check for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/qualificationchecks/{qualificationCheckId}
 */
class UpdateEmployeeQualificationCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForUpdate|array<string, mixed>  $employeeQualificationCheck
     */
    public function __construct(
        protected int $employeeId,
        protected int $qualificationCheckId,
        protected EmployeeQualificationCheckForUpdate|array $employeeQualificationCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualificationchecks/'.rawurlencode((string) $this->qualificationCheckId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeQualificationCheck instanceof Data ? $this->employeeQualificationCheck->toArray() : $this->employeeQualificationCheck;
    }
}
