<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\Modules;

use spkm\IsamsApi\Batch\BatchData;

readonly class Groups extends BatchData
{
    public function __construct(
        public ?Group $group = null,
    ) {
    }
}
