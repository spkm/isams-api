<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\Sets;

use spkm\IsamsApi\Batch\BatchData;

readonly class Teacher extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $staffId = null,
        public ?bool $primaryTeacher = null,
    ) {
    }
}
