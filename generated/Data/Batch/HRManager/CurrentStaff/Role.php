<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff;

use spkm\IsamsApi\Batch\BatchData;

readonly class Role extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}
