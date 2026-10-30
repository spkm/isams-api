<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Contacts;

use spkm\IsamsApi\Batch\BatchData;

readonly class AddressLines extends BatchData
{
    public function __construct(
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
    ) {
    }
}
