<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\PushNotifications\NotificationChannel;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/notifications/push/channels
 */
class GetPushNotificationPortalChannelsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = NotificationChannel::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/channels';
    }
}
