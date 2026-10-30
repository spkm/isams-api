<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class CustomStudentGroup extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $applicantCount = null,
        public ?int $category = null,
        public ?string $createdBy = null,
        public ?CarbonImmutable $createdOn = null,
        public ?int $currentStudentCount = null,
        public ?string $description = null,
        public ?bool $editableByOthers = null,
        public ?CarbonImmutable $expiresOn = null,
        public ?int $formerStudentCount = null,
        public ?bool $hidden = null,
        public ?bool $ignoreExpiryDate = null,
        public ?string $name = null,
        public ?int $removedStudentCount = null,
        public ?bool $shared = null,
        public ?int $totalStudentCount = null,
    ) {
    }
}
