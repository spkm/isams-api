<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ConcernStudentSummary extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $concernId = null,
        public ?bool $hasLinkedConcern = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $role = null,
        public ?int $roleId = null,
        public ?string $schoolId = null,
        public ?string $student = null,
    ) {
    }
}
