<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class DocumentDownloadHistory extends Data
{
    public function __construct(
        public ?bool $authorised = null,
        public ?Document $document = null,
        public ?string $ipAddress = null,
        public ?int $logId = null,
        public ?CarbonImmutable $submitDateTime = null,
    ) {
    }
}
