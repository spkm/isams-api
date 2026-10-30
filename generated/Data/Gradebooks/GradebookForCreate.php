<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookForCreateDisplayGradesetCountRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookForCreateDisplayMaximumRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookForCreateDisplayMeanRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookForCreateDisplayMedianRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookForCreateDisplayMinimumRow;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookForCreateDisplayStandardDeviationRow;

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

    public function displayGradesetCountRowEnum(): ?GradebookForCreateDisplayGradesetCountRow
    {
        return GradebookForCreateDisplayGradesetCountRow::tryFrom((string) $this->displayGradesetCountRow);
    }

    public function displayMaximumRowEnum(): ?GradebookForCreateDisplayMaximumRow
    {
        return GradebookForCreateDisplayMaximumRow::tryFrom((string) $this->displayMaximumRow);
    }

    public function displayMeanRowEnum(): ?GradebookForCreateDisplayMeanRow
    {
        return GradebookForCreateDisplayMeanRow::tryFrom((string) $this->displayMeanRow);
    }

    public function displayMedianRowEnum(): ?GradebookForCreateDisplayMedianRow
    {
        return GradebookForCreateDisplayMedianRow::tryFrom((string) $this->displayMedianRow);
    }

    public function displayMinimumRowEnum(): ?GradebookForCreateDisplayMinimumRow
    {
        return GradebookForCreateDisplayMinimumRow::tryFrom((string) $this->displayMinimumRow);
    }

    public function displayStandardDeviationRowEnum(): ?GradebookForCreateDisplayStandardDeviationRow
    {
        return GradebookForCreateDisplayStandardDeviationRow::tryFrom((string) $this->displayStandardDeviationRow);
    }
}
