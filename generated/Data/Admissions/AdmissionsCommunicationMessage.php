<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class AdmissionsCommunicationMessage extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $attachments = null,
        public ?string $body = null,
        public ?CarbonImmutable $date = null,
        public ?string $directory = null,
        public ?string $pupilFullName = null,
        public ?int $recipients = null,
        public ?string $subject = null,
    ) {
    }
}
