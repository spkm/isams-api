<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Teaching;

use spkm\IsamsApi\Data\Data;

readonly class Subject extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?string $censusCode = null,
        public ?string $code = null,
        public ?bool $formSubject = null,
        public ?bool $hidden = null,
        public ?string $name = null,
        public ?string $reportingName = null,
        public ?bool $setSubject = null,
    ) {
    }
}
