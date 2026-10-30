<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\DataProtection;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class PortalConsentRegisterResponses extends Data
{
    protected const LISTS = [
        'parentConsentResponses' => PortalConsentRegisterResponse::class,
        'pupilConsentResponses' => PortalPupilConsentRegisterResponses::class,
    ];

    /**
     * @param  Collection<int, PortalConsentRegisterResponse>  $parentConsentResponses
     * @param  Collection<int, PortalPupilConsentRegisterResponses>  $pupilConsentResponses
     */
    public function __construct(
        public Collection $parentConsentResponses = new Collection,
        public Collection $pupilConsentResponses = new Collection,
    ) {
    }
}
