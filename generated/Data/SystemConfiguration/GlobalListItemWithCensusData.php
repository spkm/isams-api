<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class GlobalListItemWithCensusData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $common = null,
        public ?CensusData $ctf = null,
        public ?string $description = null,
        public ?CensusData $dfe = null,
        public ?CensusData $isc = null,
        public ?string $listType = null,
        public ?string $name = null,
    ) {
    }
}
