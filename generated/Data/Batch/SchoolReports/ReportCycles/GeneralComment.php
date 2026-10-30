<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles;

use spkm\IsamsApi\Batch\BatchData;

readonly class GeneralComment extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $comment = null,
        public ?int $reportType = null,
        public ?string $associatedEntityId = null,
        public ?string $associatedSubEntityId = null,
    ) {
    }
}
