<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\TeachingForms;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class TeachingForm extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $teacherId = null,
        public ?int $authorId = null,
        public ?string $teacher = null,
        public ?string $author = null,
        public ?string $formCode = null,
        public ?string $timetableCode = null,
        public ?int $subjectId = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
