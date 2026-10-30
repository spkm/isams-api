<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport;

use spkm\IsamsApi\Batch\BatchData;

readonly class CustomField extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $area = null,
        public ?string $name = null,
        public ?string $section = null,
        public ?string $value = null,
    ) {
    }
}
