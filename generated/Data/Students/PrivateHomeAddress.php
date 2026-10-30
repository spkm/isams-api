<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class PrivateHomeAddress extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?string $postcode = null,
        public ?bool $private = null,
        public ?string $town = null,
    ) {
    }
}
