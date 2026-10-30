<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\Calendar\GetCalendarPublishedEventsByKeyPhraseRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Calendar\GetCalendarPublishedEventsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CalendarResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\CalendarEvent>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Calendar\GetCalendarPublishedEventsRequest
     */
    public function getPublishedEvents(
        ?int $targetId = null,
        DateTimeInterface|string|null $startDate = null,
        DateTimeInterface|string|null $endDate = null,
    ): Collection {
        return $this->fetch(new GetCalendarPublishedEventsRequest(targetId: $targetId, startDate: $startDate, endDate: $endDate));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\CalendarEvent>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Calendar\GetCalendarPublishedEventsByKeyPhraseRequest
     */
    public function getPublishedEventsByKeyPhrase(string $keyphrase, ?int $targetId = null): Collection
    {
        return $this->fetch(new GetCalendarPublishedEventsByKeyPhraseRequest(keyphrase: $keyphrase, targetId: $targetId));
    }
}
