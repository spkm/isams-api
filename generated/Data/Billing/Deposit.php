<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Deposit extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $amount = null,
        public ?CarbonImmutable $date = null,
        public ?string $paymentMethod = null,
        public ?string $pupilName = null,
        public ?string $reference = null,
        public ?string $source = null,
        public ?string $status = null,
        public ?string $type = null,
    ) {
    }
}
