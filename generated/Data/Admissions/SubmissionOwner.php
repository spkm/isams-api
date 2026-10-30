<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use spkm\IsamsApi\Data\Data;

readonly class SubmissionOwner extends Data
{
    public function __construct(
        public ?string $submissionGlobalReferenceId = null,
        public ?string $userCode = null,
    ) {
    }
}
