<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use spkm\IsamsApi\Data\Data;

readonly class VisitApplicantContactAttendance extends Data
{
    public function __construct(
        public ?VisitApplicantAttendance $applicant = null,
        public ?string $contactPersonGuid = null,
        public ?bool $hasContactAttended = null,
        public ?string $secondaryContactPersonGuid = null,
    ) {
    }
}
