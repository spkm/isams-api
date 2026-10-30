<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Qualification;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all qualifications associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/qualifications
 */
class GetEmployeeQualificationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Qualification::class;
    public string $resultKey = 'qualifications';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualifications';
    }
}
