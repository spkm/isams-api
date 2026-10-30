<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\UABIdentifiers;

use spkm\IsamsApi\Batch\BatchData;

readonly class UABIdentifier extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $parentGroupId = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?bool $custom = null,
    ) {
    }
}
