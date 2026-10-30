<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Contacts;

use spkm\IsamsApi\Batch\BatchData;

readonly class Address extends BatchData
{
    public function __construct(
        public ?bool $pupilAddress = null,
        public ?AddressLines $addressLines = null,
        public ?string $town = null,
        public ?string $postcode = null,
        public ?string $county = null,
        public ?string $country = null,
    ) {
    }
}
