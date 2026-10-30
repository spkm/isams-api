<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class CallbackSubmissionForCreate extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $captchaToken = null,
        public ?string $emailAddress = null,
        public ?CarbonImmutable $followUpDate = null,
        public ?string $forename = null,
        public ?string $ipAddress = null,
        public ?string $message = null,
        public ?string $modifiedBy = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $notes = null,
        public ?string $phoneNumber = null,
        public ?int $status = null,
        public ?CarbonImmutable $submittedOn = null,
        public ?string $surname = null,
    ) {
    }
}
