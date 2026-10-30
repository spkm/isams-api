<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use spkm\IsamsApi\Data\Data;

readonly class StatementHeader extends Data
{
    public function __construct(
        public ?string $accountBalance = null,
        public ?string $accountOverdueBalance = null,
        public ?string $currency = null,
        public ?string $customerCode = null,
        public ?string $statementDate = null,
    ) {
    }
}
