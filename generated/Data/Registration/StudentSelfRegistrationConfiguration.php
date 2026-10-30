<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class StudentSelfRegistrationConfiguration extends Data
{
    public function __construct(
        public ?bool $allowAmPmOnlySelfRegistrations = null,
        public ?bool $allowMultipleSelfRegistrations = null,
        public ?bool $allowPastSelfRegistrations = null,
        public ?bool $allowSelfRegistrations = null,
        public ?int $pastSelfRegistrationsThreshold = null,
    ) {
    }
}
