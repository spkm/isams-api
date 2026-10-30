<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\EstateManager\Buildings;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Building extends BatchData
{
    protected const LISTS = ['classrooms' => Classroom::class];

    /**
     * @param  Collection<int, Classroom>  $classrooms
     */
    public function __construct(
        public ?int $id = null,
        public ?int $parent = null,
        public ?string $name = null,
        public ?string $initials = null,
        public ?string $description = null,
        public ?bool $classroom = null,
        public ?int $ordinal = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $classrooms = new Collection,
    ) {
    }
}
