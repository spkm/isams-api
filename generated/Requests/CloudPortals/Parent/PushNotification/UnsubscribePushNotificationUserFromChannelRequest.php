<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\NotificationSubscription;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/notifications/push/subscriptions/unsubscribe
 */
class UnsubscribePushNotificationUserFromChannelRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscription|array<string, mixed>  $notificationSubscription
     */
    public function __construct(
        protected NotificationSubscription|array $notificationSubscription,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/subscriptions/unsubscribe';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->notificationSubscription instanceof Data ? $this->notificationSubscription->toArray() : $this->notificationSubscription;
    }
}
