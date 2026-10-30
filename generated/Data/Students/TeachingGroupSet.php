<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TeachingGroupSet extends Data
{
    protected const LISTS = ['associatedTeachers' => Teacher::class, 'pupils' => TeachingGroupPupil::class];

    /**
     * @param  Collection<int, Teacher>  $associatedTeachers
     * @param  Collection<int, TeachingGroupPupil>  $pupils
     */
    public function __construct(
        public ?int $id = null,
        public Collection $associatedTeachers = new Collection,
        public ?string $block = null,
        public ?string $description = null,
        public ?string $name = null,
        public Collection $pupils = new Collection,
        public ?string $setCode = null,
        public ?string $setNumber = null,
        public ?string $subject = null,
        public ?string $subjectCode = null,
        public ?string $subjectName = null,
        public ?Teacher $teacher = null,
        public ?int $year = null,
    ) {
    }
}
