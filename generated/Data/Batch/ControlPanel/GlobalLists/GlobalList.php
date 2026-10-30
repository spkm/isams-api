<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\GlobalLists;

use spkm\IsamsApi\Batch\BatchData;

readonly class GlobalList extends BatchData
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
    ) {
    }
}
