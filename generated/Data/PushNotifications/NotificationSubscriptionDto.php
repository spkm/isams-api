<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use spkm\IsamsApi\Data\Data;

readonly class NotificationSubscriptionDto extends Data
{
    public function __construct(
        public ?string $appId = null,
        public ?string $channelId = null,
        public ?string $userCode = null,
    ) {
    }
}
