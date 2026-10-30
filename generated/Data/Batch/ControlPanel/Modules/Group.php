<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\Modules;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Group extends BatchData
{
    protected const LISTS = ['modules' => Module::class];

    /**
     * @param  Collection<int, Module>  $modules
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public Collection $modules = new Collection,
    ) {
    }
}
