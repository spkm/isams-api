<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Document extends Data
{
    public function __construct(
        public ?string $displayName = null,
        public ?int $documentId = null,
        public ?string $documentName = null,
        public ?string $fileDescription = null,
        public ?string $fileDirectory = null,
        public ?string $fileSize = null,
        public ?string $fileType = null,
        public ?int $hits = null,
        public ?int $order = null,
        public ?CarbonImmutable $submitDateTime = null,
    ) {
    }
}
