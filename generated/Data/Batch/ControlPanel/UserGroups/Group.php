<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\UserGroups;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Group extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $builtIn = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
