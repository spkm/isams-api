<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Exams;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\ExamTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/exams/cycles/{cycleId}/timetables
 */
class GetExamsTimetablesForCycleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ExamTimetable::class;
    public string $resultKey = 'examTimetables';

    public function __construct(
        protected string $schoolId,
        protected int $cycleId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/exams/cycles/'.rawurlencode((string) $this->cycleId).'/timetables';
    }
}
