<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\Departments;

use spkm\IsamsApi\Batch\BatchData;

readonly class Divisions extends BatchData
{
    public function __construct(
        public ?string $divisionName = null,
    ) {
    }
}
