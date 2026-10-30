<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a reference check associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/referencechecks/{referenceCheckId}
 */
class GetEmployeeReferenceCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeReferenceCheck::class;

    public function __construct(
        protected int $employeeId,
        protected int $referenceCheckId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/referencechecks/'.rawurlencode((string) $this->referenceCheckId);
    }
}
