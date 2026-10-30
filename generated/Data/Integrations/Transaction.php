<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use spkm\IsamsApi\Data\Data;

readonly class Transaction extends Data
{
    public function __construct(
        public ?string $amount = null,
        public ?string $amountPaid = null,
        public ?string $amountRemaining = null,
        public ?string $balance = null,
        public ?string $currency = null,
        public ?string $description = null,
        public ?string $documentRef = null,
        public ?string $dueDate = null,
        public ?string $guidCentralFileServiceId = null,
        public ?string $isamsRef = null,
        public ?string $overdueBalance = null,
        public ?string $reference = null,
        public ?string $studentName = null,
        public ?string $transactionDate = null,
        public ?string $type = null,
    ) {
    }
}
