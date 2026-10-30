<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions;

use spkm\IsamsApi\Batch\BatchData;

readonly class LinkedForm extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $formId = null,
    ) {
    }
}
