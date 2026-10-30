<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Students;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetableActivityCollectionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetablePeriodCollectionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetableWeeksRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TimetableResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\TimetableActivity>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetableActivityCollectionRequest
     */
    public function getActivityCollection(
        string $schoolId,
        DateTimeInterface|string|null $startDate = null,
    ): Collection {
        return $this->fetch(new GetTimetableActivityCollectionRequest(schoolId: $schoolId, startDate: $startDate));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\TimetablePeriod>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetablePeriodCollectionRequest
     */
    public function getPeriodCollection(
        string $schoolId,
        ?int $timetableId = null,
        ?bool $excludeExceptions = null,
        ?bool $includeMissing = null,
        ?bool $includeHiddenSubjects = null,
    ): Collection {
        return $this->fetch(new GetTimetablePeriodCollectionRequest(schoolId: $schoolId, timetableId: $timetableId, excludeExceptions: $excludeExceptions, includeMissing: $includeMissing, includeHiddenSubjects: $includeHiddenSubjects));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\TimetableActivity>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\Timetable\GetTimetableWeeksRequest
     */
    public function getWeeks(string $schoolId, DateTimeInterface|string|null $date = null): Collection
    {
        return $this->fetch(new GetTimetableWeeksRequest(schoolId: $schoolId, date: $date));
    }
}
