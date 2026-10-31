<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\AgencyManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Agency extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?Branch $branch = null,
    ) {
    }
}
