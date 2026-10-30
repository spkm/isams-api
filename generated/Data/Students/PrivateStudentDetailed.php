<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class PrivateStudentDetailed extends Data
{
    protected const LISTS = [
        'contacts' => PrivateStudentDetailedContact::class,
        'registers' => PrivateStudentRegisterMembership::class,
    ];

    /**
     * @param  Collection<int, PrivateStudentDetailedContact>  $contacts
     * @param  Collection<int, PrivateStudentRegisterMembership>  $registers
     */
    public function __construct(
        public ?string $academicHouse = null,
        public ?string $boardingHouse = null,
        public Collection $contacts = new Collection,
        public ?string $forename = null,
        public ?string $formGroup = null,
        public ?string $latestPhotoDirectory = null,
        public ?int $latestPhotoId = null,
        public ?string $latestPhotoPath = null,
        public ?PrivateStudentMedical $medical = null,
        public ?string $preferredName = null,
        public ?string $preferredSurname = null,
        public Collection $registers = new Collection,
        public ?string $schoolId = null,
        public ?PrivateStudentSen $sen = null,
        public ?string $surname = null,
    ) {
    }
}
