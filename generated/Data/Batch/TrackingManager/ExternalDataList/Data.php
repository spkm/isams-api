<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TrackingManager\ExternalDataList;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Data extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $type = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?bool $imported = null,
        public ?bool $active = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?bool $ordinal = null,
        public ?string $directory = null,
        public ?string $filename = null,
        public ?string $author = null,
        public ?CarbonImmutable $created = null,
        public ?string $editor = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
