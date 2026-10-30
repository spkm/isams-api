<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ControlPanel\Users;

use spkm\IsamsApi\Batch\BatchData;

readonly class User extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?string $name = null,
        public ?string $schoolId = null,
        public ?string $type = null,
        public ?string $title = null,
        public ?string $forename = null,
        public ?string $surname = null,
        public ?string $fullName = null,
        public ?string $email = null,
    ) {
    }
}
