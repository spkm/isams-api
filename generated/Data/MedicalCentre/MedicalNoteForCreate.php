<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class MedicalNoteForCreate extends Data
{
    public function __construct(
        public ?CarbonImmutable $createdDate = null,
        public ?string $note = null,
        public ?CarbonImmutable $reviewDate = null,
        public ?int $sensitivity = null,
        public ?string $type = null,
        public ?int $typeId = null,
    ) {
    }
}
