<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\Timetable;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\TimetableActivity;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get timetable activities for pupil
 *
 * GET /api/portals/students/{schoolId}/timetables/activities
 */
class GetTimetableActivityCollectionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = TimetableActivity::class;
    public string $resultKey = 'timetableActivities';

    public function __construct(
        protected string $schoolId,
        protected \DateTimeInterface|string|null $startDate = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/timetables/activities';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'startDate' => $this->startDate instanceof \DateTimeInterface ? $this->startDate->format('Y-m-d\TH:i:s') : $this->startDate,
        ], fn (mixed $value) => $value !== null);
    }
}
