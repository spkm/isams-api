<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;

readonly class SalaryPayScale extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?float $amount = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?int $nextRank = null,
        public ?string $payGroup = null,
        public ?int $payGroupId = null,
        public ?int $rank = null,
    ) {
    }
}
