<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\School\Enums\HouseGender;
use spkm\IsamsApi\Data\School\Enums\HouseType;

readonly class House extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $addressLine = null,
        public ?int $assistantHouseMasterEmployeeId = null,
        public ?string $code = null,
        public ?string $county = null,
        public ?string $email = null,
        public ?string $fax = null,
        public ?string $gender = null,
        public ?int $houseMasterEmployeeId = null,
        public ?string $name = null,
        public ?string $postcode = null,
        public ?string $telephone = null,
        public ?string $town = null,
        public ?string $type = null,
        public ?string $website = null,
    ) {
    }

    public function genderEnum(): ?HouseGender
    {
        return HouseGender::tryFrom((string) $this->gender);
    }

    public function typeEnum(): ?HouseType
    {
        return HouseType::tryFrom((string) $this->type);
    }
}
