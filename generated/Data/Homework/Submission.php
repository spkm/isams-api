<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Homework\Enums\SubmissionStatus;

readonly class Submission extends Data
{
    public function __construct(
        public ?string $status = null,
    ) {
    }

    public function statusEnum(): ?SubmissionStatus
    {
        return SubmissionStatus::tryFrom((string) $this->status);
    }
}
