<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Contacts;

use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $status = null,
        public ?string $schoolId = null,
    ) {
    }
}
