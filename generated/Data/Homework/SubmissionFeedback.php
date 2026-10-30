<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class SubmissionFeedback extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $comment = null,
        public ?string $createdBy = null,
        public ?string $createdByFirstname = null,
        public ?string $createdByPreferredName = null,
        public ?string $createdBySurname = null,
        public ?CarbonImmutable $createdOn = null,
        public ?string $mark = null,
    ) {
    }
}
