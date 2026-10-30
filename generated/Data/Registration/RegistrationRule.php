<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class RegistrationRule extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $allowAbsenceCodes = null,
        public ?bool $allowLateMarks = null,
        public ?bool $allowLeavingEarly = null,
        public ?bool $allowNotes = null,
        public ?bool $allowPresentCodes = null,
        public ?bool $includeAllAcademicHouses = null,
        public ?bool $includeAllBoardingHouses = null,
        public ?bool $includeAllForms = null,
        public ?bool $includeAllSets = null,
        public ?bool $includeAllTutors = null,
        public ?bool $includeAllYears = null,
        public ?string $name = null,
    ) {
    }
}
