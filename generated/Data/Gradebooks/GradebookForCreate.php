<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayGradesetCountRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMaximumRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMeanRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMedianRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayMinimumRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookDisplayStandardDeviationRow;

readonly class GradebookForCreate extends Data
{
    public function __construct(
        public bool $areStudentAllocationsLocked,
        public string $displayGradesetCountRow,
        public string $displayMaximumRow,
        public string $displayMeanRow,
        public string $displayMedianRow,
        public string $displayMinimumRow,
        public string $displayStandardDeviationRow,
        public bool $isDataEntryLocked,
        public string $name,
        public ?string $description = null,
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
