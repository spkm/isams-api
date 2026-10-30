<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Timetable\Structures\GetTimetableStructuresRequest;

class StructuresResource extends BaseResource
{
    public function all(
        ?int $academicYear = null,
        DateTimeInterface|string|null $calendarEndDate = null,
        DateTimeInterface|string|null $calendarStartDate = null,
        ?int $calendarWeek = null,
        ?string $divisionCode = null,
        ?string $termName = null,
        ?string $timetableWeekShortName = null,
    ): Response {
        return $this->connector->send(new GetTimetableStructuresRequest($academicYear, $calendarEndDate, $calendarStartDate, $calendarWeek, $divisionCode, $termName, $timetableWeekShortName));
    }
}
