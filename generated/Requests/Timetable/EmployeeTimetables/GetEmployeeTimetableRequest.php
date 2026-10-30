<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\EmployeeTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\EmployeeTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an employee's timetable.
 *
 * GET /api/timetables/employees/{employeeId}
 */
class GetEmployeeTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeTimetable::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/employees/'.rawurlencode((string) $this->employeeId);
    }
}
