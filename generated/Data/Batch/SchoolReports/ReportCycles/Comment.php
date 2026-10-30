<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles;

use spkm\IsamsApi\Batch\BatchData;

readonly class Comment extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $reportId = null,
        public ?int $commentId = null,
        public ?string $comment = null,
    ) {
    }
}
