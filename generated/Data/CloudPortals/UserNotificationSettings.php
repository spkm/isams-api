<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class UserNotificationSettings extends Data
{
    public function __construct(
        public ?bool $detentionEmail = null,
        public ?bool $detentionSMS = null,
        public ?bool $registrationEmail = null,
        public ?bool $registrationSMS = null,
        public ?bool $rewardAndConductEmail = null,
        public ?bool $rewardAndConductSMS = null,
    ) {
    }
}
