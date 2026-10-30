<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolManager\Forms;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Form extends BatchData
{
    public function __construct(
        public ?string $id = null,
        public ?int $tutorId = null,
        public ?int $assistantTutorId = null,
        public ?int $yearId = null,
        public ?int $roomId = null,
        public ?int $authorId = null,
        public ?string $form = null,
        public ?string $tutor = null,
        public ?string $assistantFormTutor = null,
        public ?string $secondAssistantFormTutor = null,
        public ?int $nationalCurriculumYear = null,
        public ?int $emailAddress = null,
        public ?int $website = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
