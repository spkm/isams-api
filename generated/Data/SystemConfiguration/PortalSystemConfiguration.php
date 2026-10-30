<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\SystemConfiguration;

use spkm\IsamsApi\Data\Data;

readonly class PortalSystemConfiguration extends Data
{
    /**
     * @param  array<string, mixed>|null  $currencySettings
     * @param  array<string, mixed>|null  $defaultLanguage
     * @param  array<string, mixed>|null  $reCaptchaSettings
     */
    public function __construct(
        public ?array $currencySettings = null,
        public ?array $defaultLanguage = null,
        public ?PortalDocumentSettings $portalDocumentSettings = null,
        public ?PortalExternalAccountFeatures $portalExternalAccountFeatures = null,
        public ?array $reCaptchaSettings = null,
        public ?WritebackOptions $writebackOptions = null,
    ) {
    }
}
