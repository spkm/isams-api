<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class WorkflowAction extends Data
{
    /**
     * @param  array<string, mixed>|null  $configuration
     */
    public function __construct(
        public ?int $id = null,
        public ?string $actionType = null,
        public ?bool $configurable = null,
        public ?array $configuration = null,
        public ?string $name = null,
        public ?int $workflowId = null,
    ) {
    }
}
