<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\AgencyManager\ActiveAgencies;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Visit extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $visitDate = null,
        public ?string $visitNotes = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
