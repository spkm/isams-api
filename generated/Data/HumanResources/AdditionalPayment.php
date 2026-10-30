<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class AdditionalPayment extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $additionalPaymentType = null,
        public ?int $additionalPaymentTypeId = null,
        public ?float $amount = null,
        public ?string $description = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?int $salaryId = null,
        public ?CarbonImmutable $startDate = null,
        public ?int $units = null,
    ) {
    }
}
