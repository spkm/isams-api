<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\DataProtection;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class PortalPupilConsentRegisterResponses extends Data
{
    protected const LISTS = ['consentRegisterResponses' => PortalConsentRegisterResponse::class];

    /**
     * @param  Collection<int, PortalConsentRegisterResponse>  $consentRegisterResponses
     */
    public function __construct(
        public Collection $consentRegisterResponses = new Collection,
        public ?string $labelSalutation = null,
        public ?int $personId = null,
        public ?string $schoolId = null,
    ) {
    }
}
