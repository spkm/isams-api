<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class PrivateStudentMedical extends Data
{
    protected const LISTS = [
        'conditions' => PrivateStudentMedicalCondition::class,
        'medications' => PrivateStudentMedicalMedication::class,
    ];

    /**
     * @param  Collection<int, PrivateStudentMedicalCondition>  $conditions
     * @param  Collection<int, PrivateStudentMedicalMedication>  $medications
     */
    public function __construct(
        public Collection $conditions = new Collection,
        public ?bool $medicalFlag = null,
        public Collection $medications = new Collection,
    ) {
    }
}
