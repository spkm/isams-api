<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ElectronicFormResponseForCreate extends Data
{
    protected const LISTS = ['itemResponses' => ElectronicFormItemResponseForCreate::class];

    /**
     * @param  Collection<int, ElectronicFormItemResponseForCreate>  $itemResponses
     */
    public function __construct(
        public Collection $itemResponses,
    ) {
    }
}
