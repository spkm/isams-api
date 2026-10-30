<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SENManager\Requirements;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Type extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?string $type = null,
        public ?string $description = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?int $rank = null,
        public ?CarbonImmutable $needStartDate = null,
        public ?CarbonImmutable $needEndDate = null,
    ) {
    }
}
