<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ExamArrangement extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $arrangementNotes = null,
        public ?bool $colourNaming = null,
        public ?bool $dictionary = null,
        public ?CarbonImmutable $endDate = null,
        public ?bool $enlargedPapers = null,
        public ?string $examCode = null,
        public ?int $extraTime = null,
        public ?bool $processor = null,
        public ?bool $prompter = null,
        public ?bool $readAloudOrPen = null,
        public ?bool $reader = null,
        public ?bool $rest = null,
        public ?bool $scribe = null,
        public ?bool $separateInvigilation = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $submittedOn = null,
        public ?bool $transcript = null,
        public ?int $type = null,
    ) {
    }
}
