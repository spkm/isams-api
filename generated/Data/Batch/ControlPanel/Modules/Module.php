<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\Modules;

use spkm\IsamsApi\Batch\BatchData;

readonly class Module extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $description = null,
    ) {
    }
}
