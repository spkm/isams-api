<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class TeachingGroupMovedHistory extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $boardingHouse = null,
        public ?string $code = null,
        public ?string $forename = null,
        public ?string $form = null,
        public ?string $gender = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $name = null,
        public ?int $ncYear = null,
        public ?int $number = null,
        public ?string $oldCode = null,
        public ?string $oldName = null,
        public ?int $oldNumber = null,
        public ?int $oldSubjectId = null,
        public ?int $oldYear = null,
        public ?string $preferredSurname = null,
        public ?string $preName = null,
        public ?int $schoolYear = null,
        public ?string $subjectCode = null,
        public ?int $subjectId = null,
        public ?string $subjectName = null,
        public ?string $surname = null,
        public ?Teacher $teacher = null,
        public ?string $type = null,
        public ?string $userName = null,
        public ?int $year = null,
        public ?string $yearCode = null,
    ) {
    }
}
