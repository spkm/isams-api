<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class EmployeeHouses extends Data
{
    protected const LISTS = ['assistant' => House::class, 'associate' => House::class, 'master' => House::class];

    /**
     * @param  Collection<int, House>  $assistant
     * @param  Collection<int, House>  $associate
     * @param  Collection<int, House>  $master
     */
    public function __construct(
        public Collection $assistant = new Collection,
        public Collection $associate = new Collection,
        public Collection $master = new Collection,
    ) {
    }
}
