<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class ConcernVisibilityGroupsForPatch extends Data
{
    /**
     * @param  list<int>|null  $concernVisibilityGroupIds
     */
    public function __construct(
        public ?array $concernVisibilityGroupIds = null,
    ) {
    }
}
