<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\StudentRegisters\Enums\RegisterWorkflow;

readonly class Register extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?string $reportingKey = null,
        public ?string $workflow = null,
    ) {
    }

    public function workflowEnum(): ?RegisterWorkflow
    {
        return RegisterWorkflow::tryFrom((string) $this->workflow);
    }
}
