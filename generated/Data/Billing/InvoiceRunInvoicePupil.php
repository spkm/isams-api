<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class InvoiceRunInvoicePupil extends Data
{
    public function __construct(
        public ?string $academicHouse = null,
        public ?string $boardingHouse = null,
        public ?CarbonImmutable $dateOfBirth = null,
        public ?string $forename = null,
        public ?string $form = null,
        public ?string $fullName = null,
        public ?string $gender = null,
        public ?string $middleNames = null,
        public ?int $ncYear = null,
        public ?string $pupilAccountCode = null,
        public ?string $schoolId = null,
        public ?string $surname = null,
        public ?string $yearName = null,
    ) {
    }
}
