<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\AgencyManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Contact extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $forename = null,
        public ?string $surname = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $town = null,
        public ?string $county = null,
        public ?string $postcode = null,
        public ?string $telephone = null,
        public ?string $fax = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
