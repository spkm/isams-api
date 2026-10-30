<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\OtherSchools\Schools;

use spkm\IsamsApi\Batch\BatchData;

readonly class Contact extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $initials = null,
        public ?Profession $profession = null,
        public ?string $salutation = null,
        public ?string $surname = null,
        public ?string $title = null,
        public ?string $forename = null,
        public ?string $fullname = null,
    ) {
    }
}
