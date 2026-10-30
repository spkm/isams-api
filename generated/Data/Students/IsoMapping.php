<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class IsoMapping extends Data
{
    public function __construct(
        public ?string $iSAMSName = null,
        public ?string $isoCode2Char = null,
        public ?string $isoCode3Char = null,
        public ?string $isoName = null,
    ) {
    }
}
