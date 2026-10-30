<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications\Enums;

enum Platform: string
{
    case Ios = 'Ios';
    case Android = 'Android';
    case Windows = 'Windows';
    case Browser = 'Browser';
}
