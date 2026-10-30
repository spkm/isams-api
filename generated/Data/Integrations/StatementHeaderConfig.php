<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use spkm\IsamsApi\Data\Data;

readonly class StatementHeaderConfig extends Data
{
    public function __construct(
        public ?bool $hasAccountBalance = null,
        public ?bool $hasCurrency = null,
        public ?bool $hasCustomerCode = null,
        public ?bool $hasStatementDate = null,
        public ?bool $hasStatementForAccountLine = null,
        public ?bool $hasStudentFilter = null,
    ) {
    }
}
