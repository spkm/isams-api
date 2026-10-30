<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class ContactGroupContact extends Data
{
    /**
     * @param  list<string>  $schoolIds
     */
    public function __construct(
        public ?string $modifiedBy = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?int $personId = null,
        public array $schoolIds = [],
    ) {
    }
}
