<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Timetable\Enums\ImportAction;
use spkm\IsamsApi\Data\Timetable\Enums\NonClassOption;

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

    public function importActionEnum(): ?ImportAction
    {
        return ImportAction::tryFrom((string) $this->importAction);
    }

    public function nonClassOptionEnum(): ?NonClassOption
    {
        return NonClassOption::tryFrom((string) $this->nonClassOption);
    }
}
