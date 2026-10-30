<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class PrivateStudentDetailedContact extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $email = null,
        public ?string $forename = null,
        public ?bool $isPrimaryContact = null,
        public ?string $phoneNumber = null,
        public ?string $relationship = null,
        public ?string $surname = null,
        public ?string $title = null,
    ) {
    }
}
