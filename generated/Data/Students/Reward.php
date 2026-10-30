<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Reward extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $awardedOn = null,
        public ?int $category = null,
        public ?string $categoryImage = null,
        public ?string $categoryName = null,
        public ?string $description = null,
        public ?string $forename = null,
        public ?bool $isAuthorised = null,
        public ?string $middleNames = null,
        public ?string $preName = null,
        public ?string $surname = null,
        public ?RewardTeacher $teacher = null,
    ) {
    }
}
