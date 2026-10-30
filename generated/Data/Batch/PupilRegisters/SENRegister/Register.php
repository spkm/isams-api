<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilRegisters\SENRegister;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Register extends BatchData
{
    public function __construct(
        public ?int $pupilId = null,
        public ?bool $onRegister = null,
        public ?CarbonImmutable $screeningDate = null,
        public ?string $registerFlag = null,
        public ?string $registerFlagDisplayText = null,
        public ?string $tutorIds = null,
        public ?string $notes = null,
    ) {
    }
}
