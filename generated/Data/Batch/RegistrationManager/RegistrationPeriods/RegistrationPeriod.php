<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationPeriods;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class RegistrationPeriod extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $start = null,
        public ?CarbonImmutable $finish = null,
        public ?CarbonImmutable $time = null,
        public ?int $registrationRuleId = null,
        public ?string $registrationType = null,
        public ?string $friendlyName = null,
    ) {
    }
}
