<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\OtherSchools\Schools;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Profession extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $description = null,
        public ?string $code = null,
        public ?bool $active = null,
        public ?bool $default = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
