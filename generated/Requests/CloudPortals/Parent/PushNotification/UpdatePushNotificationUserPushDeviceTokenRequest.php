<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/notifications/push/token
 */
class UpdatePushNotificationUserPushDeviceTokenRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivate|array<string, mixed>  $notificationUpdateDevicePrivate
     */
    public function __construct(
        protected NotificationUpdateDevicePrivate|array $notificationUpdateDevicePrivate,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/token';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->notificationUpdateDevicePrivate instanceof Data ? $this->notificationUpdateDevicePrivate->toArray() : $this->notificationUpdateDevicePrivate;
    }
}
