<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class SmsBatch extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $categoryId = null,
        public ?string $categoryName = null,
        public ?float $charge = null,
        public ?CarbonImmutable $created = null,
        public ?string $createdBy = null,
        public ?int $deliveredCount = null,
        public ?CarbonImmutable $edited = null,
        public ?string $editedBy = null,
        public ?bool $emergency = null,
        public ?int $errorCount = null,
        public ?int $failedCount = null,
        public ?int $intReceivedCount = null,
        public ?string $name = null,
        public ?int $postedCount = null,
        public ?int $sentCount = null,
    ) {
    }
}
