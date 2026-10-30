<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use spkm\IsamsApi\Data\Data;

readonly class InvoiceRunInvoiceContact extends Data
{
    public function __construct(
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $addressType = null,
        public ?string $contactAccountCode = null,
        public ?int $contactId = null,
        public ?string $country = null,
        public ?string $county = null,
        public ?string $firstPersonEmailAddress = null,
        public ?string $labelSalutation = null,
        public ?string $letterSalutation = null,
        public ?string $postcode = null,
        public ?string $relationType = null,
        public ?string $secondPersonEmailAddress = null,
        public ?string $town = null,
    ) {
    }
}
