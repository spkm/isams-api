<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Contacts;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class AddressGroup extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $groupName = null,
        public ?string $description = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
