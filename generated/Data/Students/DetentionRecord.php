<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class DetentionRecord extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $detentionDate = null,
        public ?bool $halfDetention = null,
        public ?string $offenceCode = null,
        public ?string $offenceDescription = null,
        public ?string $sessionName = null,
        public ?string $teacherName = null,
        public ?string $workSet = null,
    ) {
    }
}
