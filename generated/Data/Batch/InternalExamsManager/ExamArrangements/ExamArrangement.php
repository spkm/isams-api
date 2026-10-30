<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\InternalExamsManager\ExamArrangements;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class ExamArrangement extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?int $extraTime = null,
        public ?bool $processor = null,
        public ?bool $restBreaks = null,
        public ?bool $transcript = null,
        public ?bool $dictionary = null,
        public ?bool $prompter = null,
        public ?string $notes = null,
        public ?int $systemStatus = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
