<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\OffGames\OffGamesList;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class OffGames extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?string $schoolId = null,
        public ?string $reason = null,
        public ?string $notes = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?bool $noEndDate = null,
        public ?bool $active = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
