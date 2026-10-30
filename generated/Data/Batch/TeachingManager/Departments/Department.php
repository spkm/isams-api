<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\Departments;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Department extends BatchData
{
    protected const LISTS = ['divisions' => Division::class, 'subjects' => Subject::class];

    /**
     * @param  Collection<int, Division>  $divisions
     * @param  Collection<int, Subject>  $subjects
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $divisions = new Collection,
        public Collection $subjects = new Collection,
    ) {
    }
}
