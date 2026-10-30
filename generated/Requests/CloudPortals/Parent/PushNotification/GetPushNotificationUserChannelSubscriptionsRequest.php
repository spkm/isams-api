<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\PushNotifications\NotificationUserSubscription;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/notifications/push/subscriptions
 */
class GetPushNotificationUserChannelSubscriptionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = NotificationUserSubscription::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/subscriptions';
    }
}
