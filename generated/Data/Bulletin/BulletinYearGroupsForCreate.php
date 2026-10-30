<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Bulletin;

use spkm\IsamsApi\Data\Data;

readonly class BulletinYearGroupsForCreate extends Data
{
    /**
     * @param  list<int>|null  $yearGroups
     */
    public function __construct(
        public ?int $bulletinId = null,
        public ?array $yearGroups = null,
    ) {
    }
}
