<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Calendar;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\CalendarEvent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/calendar/events/search/{keyphrase}
 */
class GetCalendarPublishedEventsByKeyPhraseRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CalendarEvent::class;
    public string $resultKey = 'calendarEvents';

    public function __construct(
        protected string $keyphrase,
        protected ?int $targetId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/calendar/events/search/'.rawurlencode((string) $this->keyphrase);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'targetId' => $this->targetId,
        ], fn (mixed $value) => $value !== null);
    }
}
