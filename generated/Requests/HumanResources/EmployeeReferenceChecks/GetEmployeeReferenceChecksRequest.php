<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all reference checks associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/referencechecks
 */
class GetEmployeeReferenceChecksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmployeeReferenceCheck::class;
    public string $resultKey = 'referenceChecks';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/referencechecks';
    }
}
