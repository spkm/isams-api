<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Calendar\GetCalendarPublishedEventsByKeyPhraseRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Calendar\GetCalendarPublishedEventsRequest;

class SchoolCalendarResource extends BaseResource
{
    public function getCalendarPublishedEvents(
        ?int $targetId = null,
        DateTimeInterface|string|null $startDate = null,
        DateTimeInterface|string|null $endDate = null,
    ): Response {
        return $this->connector->send(new GetCalendarPublishedEventsRequest($targetId, $startDate, $endDate));
    }

    public function getCalendarPublishedEventsByKeyPhrase(string $keyphrase, ?int $targetId = null): Response
    {
        return $this->connector->send(new GetCalendarPublishedEventsByKeyPhraseRequest($keyphrase, $targetId));
    }
}
