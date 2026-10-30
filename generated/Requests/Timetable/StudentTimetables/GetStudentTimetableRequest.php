<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\StudentTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\StudentTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's timetable.
 *
 * GET /api/timetables/students/{schoolId}
 */
class GetStudentTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StudentTimetable::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/students/'.rawurlencode((string) $this->schoolId);
    }
}
