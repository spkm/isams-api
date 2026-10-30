<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilRegisters\FreeSchoolMeals;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class FreeSchoolMeal extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?string $author = null,
        public ?string $schoolId = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?string $ukCountry = null,
        public ?string $fsmCategory = null,
        public ?CarbonImmutable $fsmEligibilityVerificationDate = null,
    ) {
    }
}
