<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\Enums\UserMessageStatusUpdateDtoDeliveryStatus;

readonly class UserMessageStatusUpdateDto extends Data
{
    public function __construct(
        public ?string $appId = null,
        public ?string $deliveryStatus = null,
        public ?int $deviceId = null,
        public ?int $messageId = null,
        public ?string $userCode = null,
    ) {
    }

    public function deliveryStatusEnum(): ?UserMessageStatusUpdateDtoDeliveryStatus
    {
        return UserMessageStatusUpdateDtoDeliveryStatus::tryFrom((string) $this->deliveryStatus);
    }
}
