<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Timetable\Enums\TimetableImportImportAction;
use spkm\IsamsApi\Data\Timetable\Enums\TimetableImportNonClassOption;

readonly class TimetableImport extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $completed = null,
        public ?int $development = null,
        public ?int $endYear = null,
        public ?string $importAction = null,
        public ?CarbonImmutable $importedOn = null,
        public ?bool $importSetLists = null,
        public ?string $importStage = null,
        public ?string $importType = null,
        public ?string $name = null,
        public ?string $nonClassOption = null,
        public ?string $setCodePrefix = null,
        public ?int $startYear = null,
        public ?int $timetableSourceId = null,
        public ?bool $useDevelopmentSets = null,
        public ?int $weekAllocationId = null,
    ) {
    }

    public function importActionEnum(): ?TimetableImportImportAction
    {
        return TimetableImportImportAction::tryFrom((string) $this->importAction);
    }

    public function nonClassOptionEnum(): ?TimetableImportNonClassOption
    {
        return TimetableImportNonClassOption::tryFrom((string) $this->nonClassOption);
    }
}
