<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Siblings;

use spkm\IsamsApi\Batch\BatchData;

readonly class Sibling extends BatchData
{
    public function __construct(
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?string $personGuid = null,
        public ?string $schoolId = null,
        public ?string $status = null,
        public ?string $author = null,
    ) {
    }
}
