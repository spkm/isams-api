<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SENManager\Lessons;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Lesson extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $subjectId = null,
        public ?int $staffId = null,
        public ?int $authorId = null,
        public ?int $day = null,
        public ?string $startTime = null,
        public ?string $endTime = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
