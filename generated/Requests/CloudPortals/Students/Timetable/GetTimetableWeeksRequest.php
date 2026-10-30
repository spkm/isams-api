<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\Timetable;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\TimetableActivity;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get timetable weeks
 *
 * GET /api/portals/students/{schoolId}/timetables/weeks
 */
class GetTimetableWeeksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = TimetableActivity::class;
    public string $resultKey = 'timetableActivities';

    public function __construct(
        protected string $schoolId,
        protected \DateTimeInterface|string|null $date = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/timetables/weeks';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date instanceof \DateTimeInterface ? $this->date->format('Y-m-d\TH:i:s') : $this->date,
        ], fn (mixed $value) => $value !== null);
    }
}
