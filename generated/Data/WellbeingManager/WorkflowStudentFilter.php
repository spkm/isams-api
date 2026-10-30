<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class WorkflowStudentFilter extends Data
{
    /**
     * @param  list<string>  $academicHouse
     * @param  list<string>  $boardingHouse
     * @param  list<string>  $customGroup
     * @param  list<string>  $department
     * @param  list<string>  $form
     * @param  list<string>  $formTutor
     * @param  list<string>  $pastoralTutor
     * @param  list<string>  $set
     * @param  list<string>  $subject
     * @param  list<string>  $year
     * @param  list<string>  $yearTutor
     */
    public function __construct(
        public array $academicHouse = [],
        public array $boardingHouse = [],
        public array $customGroup = [],
        public array $department = [],
        public ?string $forename = null,
        public array $form = [],
        public array $formTutor = [],
        public ?string $gender = null,
        public array $pastoralTutor = [],
        public ?string $preferredName = null,
        public array $set = [],
        public ?int $status = null,
        public array $subject = [],
        public ?string $surname = null,
        public array $year = [],
        public array $yearTutor = [],
    ) {
    }
}
