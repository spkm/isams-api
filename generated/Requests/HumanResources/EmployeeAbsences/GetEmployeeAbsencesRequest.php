<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Absence;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all absences associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/absences
 */
class GetEmployeeAbsencesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Absence::class;
    public string $resultKey = 'absences';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/absences';
    }
}
