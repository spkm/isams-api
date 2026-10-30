<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Agent;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Agent extends Data
{
    protected const LISTS = ['branches' => Branch::class];

    /**
     * @param  Collection<int, Branch>  $branches
     */
    public function __construct(
        public ?int $id = null,
        public Collection $branches = new Collection,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
    ) {
    }
}
