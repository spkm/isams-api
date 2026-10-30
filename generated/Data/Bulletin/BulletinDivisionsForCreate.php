<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Bulletin;

use spkm\IsamsApi\Data\Data;

readonly class BulletinDivisionsForCreate extends Data
{
    /**
     * @param  list<int>|null  $divisions
     */
    public function __construct(
        public ?int $bulletinId = null,
        public ?array $divisions = null,
    ) {
    }
}
