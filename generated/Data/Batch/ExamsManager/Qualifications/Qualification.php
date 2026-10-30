<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\Qualifications;

use spkm\IsamsApi\Batch\BatchData;

readonly class Qualification extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $title = null,
    ) {
    }
}
