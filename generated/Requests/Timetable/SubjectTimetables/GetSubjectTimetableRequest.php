<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\SubjectTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\SubjectTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a subject's timetable.
 *
 * GET /api/timetables/subjects/{subjectId}
 */
class GetSubjectTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SubjectTimetable::class;

    public function __construct(
        protected int $subjectId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/subjects/'.rawurlencode((string) $this->subjectId);
    }
}
