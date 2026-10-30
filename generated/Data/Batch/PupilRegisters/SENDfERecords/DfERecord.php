<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilRegisters\SENDfERecords;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class DfERecord extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?string $level = null,
        public ?bool $unitIndicator = null,
        public ?bool $resourcedProvisionIndicator = null,
    ) {
    }
}
