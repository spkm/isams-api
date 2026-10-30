<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications\Enums;

enum UserMessageStatusUpdateDtoDeliveryStatus: string
{
    case Received = 'Received';
    case Presented = 'Presented';
    case Interacted = 'Interacted';
}
