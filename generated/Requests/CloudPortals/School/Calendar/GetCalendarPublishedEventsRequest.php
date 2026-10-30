<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Calendar;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\CalendarEvent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/calendar/events
 */
class GetCalendarPublishedEventsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CalendarEvent::class;
    public string $resultKey = 'calendarEvents';

    public function __construct(
        protected ?int $targetId = null,
        protected \DateTimeInterface|string|null $startDate = null,
        protected \DateTimeInterface|string|null $endDate = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/calendar/events';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'targetId' => $this->targetId,
            'startDate' => $this->startDate instanceof \DateTimeInterface ? $this->startDate->format('Y-m-d\TH:i:s') : $this->startDate,
            'endDate' => $this->endDate instanceof \DateTimeInterface ? $this->endDate->format('Y-m-d\TH:i:s') : $this->endDate,
        ], fn (mixed $value) => $value !== null);
    }
}
