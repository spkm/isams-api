<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetableActivityCollectionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetablePeriodCollectionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetableWeeksRequest;

class StudentsTimetableResource extends BaseResource
{
    public function getTimetableActivityCollection(
        string $schoolId,
        DateTimeInterface|string|null $startDate = null,
    ): Response {
        return $this->connector->send(new GetTimetableActivityCollectionRequest($schoolId, $startDate));
    }

    public function getTimetablePeriodCollection(
        string $schoolId,
        ?int $timetableId = null,
        ?bool $excludeExceptions = null,
        ?bool $includeMissing = null,
        ?bool $includeHiddenSubjects = null,
    ): Response {
        return $this->connector->send(new GetTimetablePeriodCollectionRequest($schoolId, $timetableId, $excludeExceptions, $includeMissing, $includeHiddenSubjects));
    }

    public function getTimetableWeeks(string $schoolId, DateTimeInterface|string|null $date = null): Response
    {
        return $this->connector->send(new GetTimetableWeeksRequest($schoolId, $date));
    }
}
