<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class RewardForUpdate extends Data
{
    /**
     * @param  list<int>|null  $fieldValueIds
     */
    public function __construct(
        public int $categoryId,
        public CarbonImmutable $date,
        public int $moduleTypeId,
        public int $teacherId,
        public ?int $departmentId = null,
        public ?string $description = null,
        public ?array $fieldValueIds = null,
        public ?string $sessionId = null,
        public ?int $subjectId = null,
    ) {
    }
}
