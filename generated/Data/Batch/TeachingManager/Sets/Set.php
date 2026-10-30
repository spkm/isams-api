<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TeachingManager\Sets;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Set extends BatchData
{
    protected const LISTS = ['teachers' => Teacher::class];

    /**
     * @param  Collection<int, Teacher>  $teachers
     */
    public function __construct(
        public ?int $id = null,
        public ?int $subjectId = null,
        public ?int $yearId = null,
        public ?int $authorId = null,
        public ?string $teacher = null,
        public ?string $author = null,
        public ?string $setNumber = null,
        public ?string $block = null,
        public ?string $setCode = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $teachers = new Collection,
    ) {
    }
}
