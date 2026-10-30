<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a qualification check for an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/qualificationchecks
 */
class CreateEmployeeQualificationCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheckForCreate|array<string, mixed>  $employeeQualificationCheck
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeQualificationCheckForCreate|array $employeeQualificationCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualificationchecks';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeQualificationCheck instanceof Data ? $this->employeeQualificationCheck->toArray() : $this->employeeQualificationCheck;
    }
}
