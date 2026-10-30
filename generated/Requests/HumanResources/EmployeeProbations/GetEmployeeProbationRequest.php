<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeProbations;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeProbation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the probation information for an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/probation
 */
class GetEmployeeProbationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeProbation::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/probation';
    }
}
