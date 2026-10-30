<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Teaching;

use spkm\IsamsApi\Data\Data;

readonly class TeachingSet extends Data
{
    /**
     * @param  list<int>  $associatedTeacherIds
     */
    public function __construct(
        public ?int $id = null,
        public array $associatedTeacherIds = [],
        public ?string $block = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?int $maxSize = null,
        public ?string $name = null,
        public ?int $ncYear = null,
        public ?string $setNumber = null,
        public ?int $subjectId = null,
        public ?int $teacherId = null,
    ) {
    }
}
