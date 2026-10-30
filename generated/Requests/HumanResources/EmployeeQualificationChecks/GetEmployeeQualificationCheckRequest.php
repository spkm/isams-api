<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a qualification check associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/qualificationchecks/{qualificationCheckId}
 */
class GetEmployeeQualificationCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeQualificationCheck::class;

    public function __construct(
        protected int $employeeId,
        protected int $qualificationCheckId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualificationchecks/'.rawurlencode((string) $this->qualificationCheckId);
    }
}
