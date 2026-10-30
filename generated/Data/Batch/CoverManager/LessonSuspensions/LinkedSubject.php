<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions;

use spkm\IsamsApi\Batch\BatchData;

readonly class LinkedSubject extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $subjectId = null,
        public ?int $yearId = null,
    ) {
    }
}
