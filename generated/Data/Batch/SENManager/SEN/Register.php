<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SENManager\SEN;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Register extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $staffID = null,
        public ?int $authorId = null,
        public ?int $screened = null,
        public ?CarbonImmutable $screeningDate = null,
        public ?int $registerFlag = null,
        public ?string $notes = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
