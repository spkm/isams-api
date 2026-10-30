<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Timetable\Enums\TimetableImportRequestForCreateImportAction;
use spkm\IsamsApi\Data\Timetable\Enums\TimetableImportRequestForCreateNonClassOption;

readonly class TimetableImportRequestForCreate extends Data
{
    protected const LISTS = [
        'lessons' => TimetableLesson::class,
        'nonClassData' => TimetableImportNonClassDataForCreate::class,
        'setLists' => TimetableImportSetListForCreate::class,
        'subjects' => TimetableImportSubjectForCreate::class,
    ];

    /**
     * @param  Collection<int, TimetableLesson>  $lessons
     * @param  Collection<int, TimetableImportNonClassDataForCreate>|null  $nonClassData
     * @param  Collection<int, TimetableImportSetListForCreate>|null  $setLists
     * @param  Collection<int, TimetableImportSubjectForCreate>|null  $subjects
     */
    public function __construct(
        public string $importAction,
        public Collection $lessons,
        public string $name,
        public ?int $endYear = null,
        public ?bool $importSetLists = null,
        public ?bool $importSubjects = null,
        public ?Collection $nonClassData = null,
        public ?string $nonClassOption = null,
        public ?Collection $setLists = null,
        public ?int $startYear = null,
        public ?Collection $subjects = null,
        public ?int $timetableSourceId = null,
        public ?bool $useDevelopmentSets = null,
        public ?int $weekAllocationId = null,
    ) {
    }

    public function importActionEnum(): ?TimetableImportRequestForCreateImportAction
    {
        return TimetableImportRequestForCreateImportAction::tryFrom((string) $this->importAction);
    }

    public function nonClassOptionEnum(): ?TimetableImportRequestForCreateNonClassOption
    {
        return TimetableImportRequestForCreateNonClassOption::tryFrom((string) $this->nonClassOption);
    }
}
