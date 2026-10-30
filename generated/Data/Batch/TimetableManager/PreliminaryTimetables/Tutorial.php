<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TimetableManager\PreliminaryTimetables;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Tutorial extends BatchData
{
    protected const LISTS = ['periods' => Period::class, 'pupils' => Pupil::class, 'teachers' => Teacher::class];

    /**
     * @param  Collection<int, Period>  $periods
     * @param  Collection<int, Pupil>  $pupils
     * @param  Collection<int, Teacher>  $teachers
     */
    public function __construct(
        public ?int $id = null,
        public ?string $displayCode = null,
        public ?string $displayName = null,
        public ?int $roomId = null,
        public ?bool $pupil = null,
        public ?bool $teacher = null,
        public ?bool $room = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $periods = new Collection,
        public Collection $pupils = new Collection,
        public Collection $teachers = new Collection,
    ) {
    }
}
