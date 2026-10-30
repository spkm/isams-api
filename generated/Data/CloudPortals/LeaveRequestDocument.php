<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class LeaveRequestDocument extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $fileDirectory = null,
        public ?string $fileGuid = null,
        public ?string $fileName = null,
        public ?int $fileSize = null,
        public ?string $fileType = null,
        public ?string $name = null,
    ) {
    }
}
