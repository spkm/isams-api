<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TeachingGroupForm extends Data
{
    protected const LISTS = ['pupils' => TeachingGroupPupil::class];

    /**
     * @param  Collection<int, TeachingGroupPupil>  $pupils
     */
    public function __construct(
        public ?int $id = null,
        public ?string $block = null,
        public ?string $description = null,
        public ?string $form = null,
        public Collection $pupils = new Collection,
        public ?string $subjectCode = null,
        public ?string $subjectName = null,
        public ?Teacher $teacher = null,
        public ?string $timetableCode = null,
    ) {
    }
}
