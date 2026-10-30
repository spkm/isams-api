<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use spkm\IsamsApi\Batch\BatchData;

readonly class HistoricalPosition extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $version = null,
        public ?string $position = null,
    ) {
    }
}
