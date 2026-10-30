<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use spkm\IsamsApi\Data\Data;

readonly class StatementDetailConfig extends Data
{
    public function __construct(
        public ?bool $hasAmount = null,
        public ?bool $hasAmountPaid = null,
        public ?bool $hasAmountRemaining = null,
        public ?bool $hasCurrency = null,
        public ?bool $hasCustomerCode = null,
        public ?bool $hasDescription = null,
        public ?bool $hasDocumentRef = null,
        public ?bool $hasDueDate = null,
        public ?bool $hasIsamsRef = null,
        public ?bool $hasReference = null,
        public ?bool $hasStatementDate = null,
        public ?bool $hasStudentName = null,
        public ?bool $hasTransactionDate = null,
        public ?bool $hasType = null,
    ) {
    }
}
