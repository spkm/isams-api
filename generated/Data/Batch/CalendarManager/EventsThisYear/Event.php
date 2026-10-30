<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisYear;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Event extends BatchData
{
    protected const LISTS = ['types' => Type::class];

    /**
     * @param  Collection<int, Type>  $types
     */
    public function __construct(
        public ?int $id = null,
        public ?int $categoryId = null,
        public ?int $subategoryId = null,
        public ?int $category = null,
        public ?int $subcategory = null,
        public ?int $nationalCurriculumYear = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $allDayEvent = null,
        public ?CarbonImmutable $startTime = null,
        public ?CarbonImmutable $endTime = null,
        public ?string $description = null,
        public ?string $location = null,
        public ?string $notes = null,
        public ?bool $hidden = null,
        public ?int $ordinal = null,
        public ?bool $edited = null,
        public ?bool $late = null,
        public Collection $types = new Collection,
    ) {
    }
}
