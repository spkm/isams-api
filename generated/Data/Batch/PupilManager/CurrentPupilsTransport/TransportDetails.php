<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport;

use spkm\IsamsApi\Batch\BatchData;

readonly class TransportDetails extends BatchData
{
    public function __construct(
        public ?string $transportType = null,
        public ?string $detail = null,
    ) {
    }
}
