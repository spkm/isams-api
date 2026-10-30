<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use spkm\IsamsApi\Data\Data;

readonly class RegistrationStatusNote extends Data
{
    public function __construct(
        public ?string $registrationNote = null,
        public ?int $registrationNoteId = null,
    ) {
    }
}
