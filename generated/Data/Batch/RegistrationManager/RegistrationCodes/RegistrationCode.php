<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationCodes;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class RegistrationCode extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $governmentCode = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $active = null,
        public ?bool $statusActive = null,
        public ?bool $outOfSchoolActive = null,
        public ?bool $absence = null,
        public ?bool $statistic = null,
        public ?bool $authorised = null,
        public ?int $ordinal = null,
        public ?string $colour = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
