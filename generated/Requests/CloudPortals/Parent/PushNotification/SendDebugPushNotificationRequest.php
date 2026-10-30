<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/notifications/push/debug
 */
class SendDebugPushNotificationRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/debug';
    }
}
