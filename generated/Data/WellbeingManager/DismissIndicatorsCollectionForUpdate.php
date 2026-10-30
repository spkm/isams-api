<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class DismissIndicatorsCollectionForUpdate extends Data
{
    /**
     * @param  list<int>|null  $indicatorIds
     */
    public function __construct(
        public ?array $indicatorIds = null,
        public ?int $reasonForDismissalId = null,
    ) {
    }
}
