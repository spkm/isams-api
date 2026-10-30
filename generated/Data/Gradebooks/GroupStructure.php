<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class GroupStructure extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $dateAvailableFrom = null,
        public ?CarbonImmutable $dateAvailableTo = null,
        public ?string $name = null,
        public ?int $parenteId = null,
        public ?string $publishedName = null,
        public ?CarbonImmutable $publishToParentPortalFrom = null,
        public ?CarbonImmutable $publishToParentPortalTo = null,
        public ?CarbonImmutable $publishToStudentPortalFrom = null,
        public ?CarbonImmutable $publishToStudentPortalTo = null,
        public ?string $shortName = null,
        public ?int $styleDesignId = null,
    ) {
    }
}
