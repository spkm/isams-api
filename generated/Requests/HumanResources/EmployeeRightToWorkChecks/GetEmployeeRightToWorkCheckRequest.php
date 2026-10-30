<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a right to work check associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/righttoworkchecks/{rightToWorkCheckId}
 */
class GetEmployeeRightToWorkCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeRightToWorkCheck::class;

    public function __construct(
        protected int $employeeId,
        protected int $rightToWorkCheckId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/righttoworkchecks/'.rawurlencode((string) $this->rightToWorkCheckId);
    }
}
