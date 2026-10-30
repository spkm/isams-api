<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class SelfRegistrationRegistersForUpdate extends Data
{
    /**
     * @param  list<int>|null  $registrationIds
     */
    public function __construct(
        public ?array $registrationIds = null,
        public ?string $schoolId = null,
        public ?string $userCode = null,
    ) {
    }
}
