<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TeachingGroup extends Data
{
    protected const LISTS = ['associatedTeachers' => Teacher::class];

    /**
     * @param  Collection<int, Teacher>  $associatedTeachers
     */
    public function __construct(
        public ?int $id = null,
        public Collection $associatedTeachers = new Collection,
        public ?string $block = null,
        public ?int $femaleCount = null,
        public ?string $form = null,
        public ?int $maleCount = null,
        public ?string $name = null,
        public ?string $setCode = null,
        public ?string $subjectCode = null,
        public ?string $subjectName = null,
        public ?Teacher $teacher = null,
        public ?string $type = null,
    ) {
    }
}
