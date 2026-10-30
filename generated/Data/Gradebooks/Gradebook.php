<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayGradesetCountRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMaximumRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMeanRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMedianRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMinimumRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayStandardDeviationRow;

readonly class Gradebook extends Data
{
    protected const LISTS = ['allocationCriteria' => AllocationCriteriaBase::class, 'tags' => TagBase::class];

    /**
     * @param  Collection<int, AllocationCriteriaBase>  $allocationCriteria
     * @param  list<string>  $characteristics
     * @param  Collection<int, TagBase>  $tags
     */
    public function __construct(
        public ?int $id = null,
        public Collection $allocationCriteria = new Collection,
        public ?bool $archived = null,
        public ?bool $areStaffAllocationsLocked = null,
        public ?bool $areStudentAllocationsLocked = null,
        public array $characteristics = [],
        public ?string $description = null,
        public ?string $displayGradesetCountRow = null,
        public ?string $displayMaximumRow = null,
        public ?string $displayMeanRow = null,
        public ?string $displayMedianRow = null,
        public ?string $displayMinimumRow = null,
        public ?string $displayStandardDeviationRow = null,
        public ?bool $isDataEntryLocked = null,
        public ?string $name = null,
        public Collection $tags = new Collection,
    ) {
    }

    public function displayGradesetCountRowEnum(): ?GradebookDisplayGradesetCountRow
    {
        return GradebookDisplayGradesetCountRow::tryFrom((string) $this->displayGradesetCountRow);
    }

    public function displayMaximumRowEnum(): ?GradebookDisplayMaximumRow
    {
        return GradebookDisplayMaximumRow::tryFrom((string) $this->displayMaximumRow);
    }

    public function displayMeanRowEnum(): ?GradebookDisplayMeanRow
    {
        return GradebookDisplayMeanRow::tryFrom((string) $this->displayMeanRow);
    }

    public function displayMedianRowEnum(): ?GradebookDisplayMedianRow
    {
        return GradebookDisplayMedianRow::tryFrom((string) $this->displayMedianRow);
    }

    public function displayMinimumRowEnum(): ?GradebookDisplayMinimumRow
    {
        return GradebookDisplayMinimumRow::tryFrom((string) $this->displayMinimumRow);
    }

    public function displayStandardDeviationRowEnum(): ?GradebookDisplayStandardDeviationRow
    {
        return GradebookDisplayStandardDeviationRow::tryFrom((string) $this->displayStandardDeviationRow);
    }
}
