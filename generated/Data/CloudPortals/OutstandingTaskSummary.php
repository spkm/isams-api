<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class OutstandingTaskSummary extends Data
{
    public function __construct(
        public ?string $continueEndpoint = null,
        public ?string $createdDate = null,
        public ?string $dueDate = null,
        public ?string $formId = null,
        public ?string $instanceId = null,
        public ?string $status = null,
        public ?string $studentId = null,
        public ?string $studentName = null,
        public ?string $title = null,
    ) {
    }
}
