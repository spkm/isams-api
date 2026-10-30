<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class LessonSuspension extends BatchData
{
    protected const LISTS = [
        'linkedForms' => LinkedForm::class,
        'linkedSchedules' => LinkedSchedule::class,
        'linkedSets' => LinkedSet::class,
        'linkedSubjects' => LinkedSubject::class,
        'linkedYears' => LinkedYear::class,
    ];

    /**
     * @param  Collection<int, LinkedForm>  $linkedForms
     * @param  Collection<int, LinkedSchedule>  $linkedSchedules
     * @param  Collection<int, LinkedSet>  $linkedSets
     * @param  Collection<int, LinkedSubject>  $linkedSubjects
     * @param  Collection<int, LinkedYear>  $linkedYears
     */
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $authorId = null,
        public ?CarbonImmutable $startDateTime = null,
        public ?CarbonImmutable $endDateTime = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $linkedForms = new Collection,
        public Collection $linkedSchedules = new Collection,
        public Collection $linkedSets = new Collection,
        public Collection $linkedSubjects = new Collection,
        public Collection $linkedYears = new Collection,
    ) {
    }
}
