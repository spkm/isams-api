<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Parameter extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $loading = null,
        public ?int $nominalLoading = null,
        public ?int $priority = null,
        public ?int $nominalCover = null,
        public ?int $maxMinutesPerDay = null,
        public ?int $maxMinutesPerWeek = null,
        public ?int $maxPeriodsPerWeek = null,
        public ?int $maxMinutesPerCycle = null,
        public ?int $maxPeriodsPerCycle = null,
        public ?int $suspensionRating = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
