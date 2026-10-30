<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\DepartmentTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\DepartmentTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a department's timetable.
 *
 * GET /api/timetables/departments/{departmentId}
 */
class GetDepartmentTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = DepartmentTimetable::class;

    public function __construct(
        protected int $departmentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/departments/'.rawurlencode((string) $this->departmentId);
    }
}
