<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class SystemNotificationSettings extends Data
{
    public function __construct(
        public ?bool $detentionEmailDefault = null,
        public ?bool $detentionEmailEnabled = null,
        public ?bool $detentionSMSDefault = null,
        public ?bool $detentionSMSEnabled = null,
        public ?bool $registrationEmailDefault = null,
        public ?bool $registrationEmailEnabled = null,
        public ?bool $registrationSMSDefault = null,
        public ?bool $registrationSMSEnabled = null,
        public ?bool $rewardAndConductEmailDefault = null,
        public ?bool $rewardAndConductEmailEnabled = null,
        public ?bool $rewardAndConductSMSDefault = null,
        public ?bool $rewardAndConductSMSEnabled = null,
    ) {
    }
}
