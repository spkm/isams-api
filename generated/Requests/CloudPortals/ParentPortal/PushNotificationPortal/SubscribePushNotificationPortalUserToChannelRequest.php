<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\NotificationSubscriptionDto;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/notifications/push/subscriptions/subscribe
 */
class SubscribePushNotificationPortalUserToChannelRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscriptionDto|array<string, mixed>  $subscribe
     */
    public function __construct(
        protected NotificationSubscriptionDto|array $subscribe,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/subscriptions/subscribe';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->subscribe instanceof Data ? $this->subscribe->toArray() : $this->subscribe;
    }
}
