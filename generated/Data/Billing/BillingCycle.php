<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class BillingCycle extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?CarbonImmutable $earlyPaymentDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?string $name = null,
        public ?int $schoolYear = null,
        public ?CarbonImmutable $startDate = null,
    ) {
    }
}
