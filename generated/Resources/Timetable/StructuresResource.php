<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Timetable\Structures\GetTimetableStructuresRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StructuresResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Timetable\TimetableWeek>
     * @see \spkm\IsamsApi\Requests\Timetable\Structures\GetTimetableStructuresRequest
     */
    public function all(
        ?int $academicYear = null,
        DateTimeInterface|string|null $calendarEndDate = null,
        DateTimeInterface|string|null $calendarStartDate = null,
        ?int $calendarWeek = null,
        ?string $divisionCode = null,
        ?string $termName = null,
        ?string $timetableWeekShortName = null,
    ): Collection {
        return $this->fetch(new GetTimetableStructuresRequest(academicYear: $academicYear, calendarEndDate: $calendarEndDate, calendarStartDate: $calendarStartDate, calendarWeek: $calendarWeek, divisionCode: $divisionCode, termName: $termName, timetableWeekShortName: $timetableWeekShortName));
    }
}
