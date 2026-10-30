<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolManager\Years;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Year extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?int $tutorId = null,
        public ?int $assistantTutorId = null,
        public ?int $nationalCurriculumYear = null,
        public ?string $tutor = null,
        public ?string $assistantTutor = null,
        public ?string $author = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $email = null,
        public ?string $website = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
