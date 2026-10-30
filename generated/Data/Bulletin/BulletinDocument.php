<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Bulletin;

use spkm\IsamsApi\Data\Data;

readonly class BulletinDocument extends Data
{
    public function __construct(
        public ?string $fileDescription = null,
        public ?string $fileDirectory = null,
        public ?string $fileName = null,
        public ?string $fileShowName = null,
    ) {
    }
}
