<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeQualificationCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all qualification checks associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/qualificationchecks
 */
class GetEmployeeQualificationChecksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmployeeQualificationCheck::class;
    public string $resultKey = 'qualificationChecks';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualificationchecks';
    }
}
