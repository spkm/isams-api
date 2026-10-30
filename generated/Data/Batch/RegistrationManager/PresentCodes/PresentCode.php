<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RegistrationManager\PresentCodes;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class PresentCode extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?bool $active = null,
        public ?bool $statusActive = null,
        public ?string $colour = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
