<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class QualificationForCreate extends Data
{
    public function __construct(
        public ?CarbonImmutable $dateAwarded = null,
        public ?string $level = null,
        public ?string $name = null,
        public ?string $subjectOne = null,
        public ?string $subjectTwo = null,
        public ?string $title = null,
        public ?int $universityId = null,
    ) {
    }
}
