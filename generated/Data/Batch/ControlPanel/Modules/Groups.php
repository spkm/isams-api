<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\Modules;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Groups extends BatchData
{
    protected const LISTS = ['group' => Group::class];

    /**
     * @param  Collection<int, Group>  $group
     */
    public function __construct(
        public Collection $group = new Collection,
    ) {
    }
}
