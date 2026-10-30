<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\ExamCycles;

use spkm\IsamsApi\Batch\BatchData;

readonly class ExamCycle extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $centreId = null,
        public ?int $formatMonth = null,
        public ?int $year = null,
        public ?int $formatYear = null,
        public ?bool $active = null,
        public ?bool $resultsActive = null,
        public ?bool $locked = null,
        public ?int $entryCount = null,
        public ?int $resultCount = null,
    ) {
    }
}
