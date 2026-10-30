<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\Agencies;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Number extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $type = null,
        public ?string $location = null,
        public ?string $value = null,
        public ?string $notes = null,
        public ?bool $default = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
