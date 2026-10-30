<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\Enums\Platform;

readonly class NotificationUpdateDevicePrivate extends Data
{
    public function __construct(
        public ?string $model = null,
        public ?string $name = null,
        public ?string $platform = null,
        public ?string $token = null,
    ) {
    }

    public function platformEnum(): ?Platform
    {
        return Platform::tryFrom((string) $this->platform);
    }
}
