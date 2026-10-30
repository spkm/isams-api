<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivateDto;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/notifications/push/token
 */
class UpdatePushNotificationPortalUserPushDeviceTokenRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivateDto|array<string, mixed>  $updateDeviceTokenPrivate
     */
    public function __construct(
        protected NotificationUpdateDevicePrivateDto|array $updateDeviceTokenPrivate,
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
        return $this->updateDeviceTokenPrivate instanceof Data ? $this->updateDeviceTokenPrivate->toArray() : $this->updateDeviceTokenPrivate;
    }
}
