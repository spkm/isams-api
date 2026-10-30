<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\Permissions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Permission extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $moduleId = null,
        public ?int $authorId = null,
        public ?string $securityId = null,
        public ?bool $read = null,
        public ?bool $write = null,
        public ?bool $modify = null,
        public ?bool $full = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $author = null,
    ) {
    }
}
