<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Absence;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an absence associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/absences/{absenceId}
 */
class GetEmployeeAbsenceRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Absence::class;

    public function __construct(
        protected int $employeeId,
        protected int $absenceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/absences/'.rawurlencode((string) $this->absenceId);
    }
}
