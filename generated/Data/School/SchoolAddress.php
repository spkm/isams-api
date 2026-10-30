<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\School;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class SchoolAddress extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $address4 = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?string $createBy = null,
        public ?CarbonImmutable $createDateTime = null,
        public ?string $name = null,
        public ?string $postcode = null,
        public ?string $submitBy = null,
        public ?CarbonImmutable $submitDateTime = null,
        public ?string $town = null,
    ) {
    }
}
