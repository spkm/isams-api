<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RegistrationManager\DatesAndTimes;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class DateTime extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?int $version = null,
        public ?bool $usesAbsenceCode = null,
        public ?bool $usesPresentCode = null,
        public ?bool $usesLate = null,
        public ?bool $usesLeavingEarly = null,
        public ?bool $usesNote = null,
        public ?bool $doublePeriods = null,
        public ?bool $formsCatchAll = null,
        public ?bool $yearsCatchAll = null,
        public ?bool $tutorsCatchAll = null,
        public ?bool $academicCatchAll = null,
        public ?bool $boardingCatchAll = null,
        public ?bool $setsCatchAll = null,
        public ?bool $cmSetsCatchAll = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
