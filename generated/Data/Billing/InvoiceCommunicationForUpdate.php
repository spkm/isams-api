<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class InvoiceCommunicationForUpdate extends Data
{
    public function __construct(
        public ?string $body = null,
        public ?CarbonImmutable $date = null,
        public ?string $from = null,
        public ?string $fromEmailAddress = null,
        public ?string $subject = null,
        public ?string $to = null,
        public ?string $toEmailAddress = null,
        public ?string $transaction = null,
    ) {
    }
}
