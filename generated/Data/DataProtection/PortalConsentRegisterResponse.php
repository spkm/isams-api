<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\DataProtection;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class PortalConsentRegisterResponse extends Data
{
    public function __construct(
        public ?int $consentRegisterId = null,
        public ?string $details = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?int $personId = null,
        public ?int $stateId = null,
        public ?string $title = null,
    ) {
    }
}
