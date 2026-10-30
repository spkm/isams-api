<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use spkm\IsamsApi\Data\Data;

readonly class Form extends Data
{
    public function __construct(
        public ?int $assistantTutor = null,
        public ?string $code = null,
        public ?string $emailAddress = null,
        public ?int $nationalCurriculumYear = null,
        public ?int $roomId = null,
        public ?int $secondAssistantTutor = null,
        public ?int $tutorId = null,
    ) {
    }
}
