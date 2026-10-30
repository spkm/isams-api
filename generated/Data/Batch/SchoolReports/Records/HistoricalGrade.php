<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class HistoricalGrade extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?int $version = null,
        public ?string $grade = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
