<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\Structures;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\TimetableWeek;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a timetable structure.
 *
 * GET /api/timetables/structure
 */
class GetTimetableStructuresRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = TimetableWeek::class;
    public string $resultKey = 'timetableWeeks';
    protected bool $cacheable = true;

    public function __construct(
        protected ?int $academicYear = null,
        protected \DateTimeInterface|string|null $calendarEndDate = null,
        protected \DateTimeInterface|string|null $calendarStartDate = null,
        protected ?int $calendarWeek = null,
        protected ?string $divisionCode = null,
        protected ?string $termName = null,
        protected ?string $timetableWeekShortName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/structure';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'academicYear' => $this->academicYear,
            'calendarEndDate' => $this->calendarEndDate instanceof \DateTimeInterface ? $this->calendarEndDate->format('Y-m-d\TH:i:s') : $this->calendarEndDate,
            'calendarStartDate' => $this->calendarStartDate instanceof \DateTimeInterface ? $this->calendarStartDate->format('Y-m-d\TH:i:s') : $this->calendarStartDate,
            'calendarWeek' => $this->calendarWeek,
            'divisionCode' => $this->divisionCode,
            'termName' => $this->termName,
            'timetableWeekShortName' => $this->timetableWeekShortName,
        ], fn (mixed $value) => $value !== null);
    }
}
