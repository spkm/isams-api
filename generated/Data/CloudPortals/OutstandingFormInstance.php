<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class OutstandingFormInstance extends Data
{
    /**
     * @param  array<string, mixed>|null  $data
     * @param  array<string, mixed>|null  $metadata
     */
    public function __construct(
        public ?array $data = null,
        public ?string $formId = null,
        public ?string $instanceId = null,
        public ?array $metadata = null,
        public ?string $saveEndpoint = null,
        public ?string $status = null,
        public ?string $submitEndpoint = null,
        public ?string $title = null,
    ) {
    }
}
