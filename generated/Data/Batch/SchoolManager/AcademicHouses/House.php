<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolManager\AcademicHouses;

use spkm\IsamsApi\Batch\BatchData;

readonly class House extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $houseMasterId = null,
        public ?int $assistantHouseMasterId = null,
        public ?string $houseMaster = null,
        public ?string $assistantHouseMaster = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $type = null,
        public ?string $sex = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $town = null,
        public ?string $county = null,
        public ?string $country = null,
        public ?string $postcode = null,
        public ?string $telephone = null,
        public ?string $fax = null,
        public ?string $primaryEmail = null,
        public ?string $secondaryEmail = null,
        public ?string $website = null,
        public ?string $tutor1 = null,
        public ?string $tutor2 = null,
        public ?string $tutor3 = null,
        public ?string $tutor4 = null,
        public ?string $tutor5 = null,
        public ?string $tutor6 = null,
        public ?string $tutor7 = null,
        public ?string $tutor8 = null,
    ) {
    }
}
