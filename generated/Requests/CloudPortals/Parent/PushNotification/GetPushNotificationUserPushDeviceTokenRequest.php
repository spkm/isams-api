<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\PushNotifications\PrivateNotificationDeviceTokenMapped;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/notifications/push/token
 */
class GetPushNotificationUserPushDeviceTokenRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PrivateNotificationDeviceTokenMapped::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/token';
    }
}
