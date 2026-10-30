<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ExamResult extends Data
{
    protected const LISTS = ['components' => ExamComponentResult::class];

    /**
     * @param  Collection<int, ExamComponentResult>  $components
     */
    public function __construct(
        public ?int $id = null,
        public Collection $components = new Collection,
        public ?string $firstGrade = null,
        public ?string $maxMark = null,
        public ?string $optionCode = null,
        public ?int $optionOrder = null,
        public ?string $optionTitle = null,
        public ?string $programme = null,
        public ?int $programmeOrder = null,
        public ?int $resultTypeId = null,
        public ?string $secondGrade = null,
        public ?string $uabCode = null,
        public ?string $uabName = null,
        public ?string $uniformGrade = null,
        public ?string $uniformMarkScale = null,
    ) {
    }
}
