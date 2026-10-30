<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\Timetable;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\TimetablePeriod;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get timetable periods for pupil
 *
 * GET /api/portals/students/{schoolId}/timetables/periods
 */
class GetTimetablePeriodCollectionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = TimetablePeriod::class;
    public string $resultKey = 'timetablePeriods';

    public function __construct(
        protected string $schoolId,
        protected ?int $timetableId = null,
        protected ?bool $excludeExceptions = null,
        protected ?bool $includeMissing = null,
        protected ?bool $includeHiddenSubjects = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/timetables/periods';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'timetableId' => $this->timetableId,
            'excludeExceptions' => $this->excludeExceptions === null ? null : ($this->excludeExceptions ? 'true' : 'false'),
            'includeMissing' => $this->includeMissing === null ? null : ($this->includeMissing ? 'true' : 'false'),
            'includeHiddenSubjects' => $this->includeHiddenSubjects === null ? null : ($this->includeHiddenSubjects ? 'true' : 'false'),
        ], fn (mixed $value) => $value !== null);
    }
}
