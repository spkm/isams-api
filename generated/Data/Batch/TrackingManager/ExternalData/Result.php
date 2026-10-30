<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TrackingManager\ExternalData;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Result extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $result = null,
        public ?string $originalResult = null,
        public ?string $schoolId = null,
        public ?string $author = null,
        public ?CarbonImmutable $created = null,
        public ?string $editor = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
