<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\PushNotifications\PushConfigurationMapped;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/notifications/push/config
 */
class GetPushNotificationConfigRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PushConfigurationMapped::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/config';
    }
}
