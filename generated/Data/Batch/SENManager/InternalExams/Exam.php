<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SENManager\InternalExams;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Exam extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?string $allowance = null,
        public ?string $notes = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
