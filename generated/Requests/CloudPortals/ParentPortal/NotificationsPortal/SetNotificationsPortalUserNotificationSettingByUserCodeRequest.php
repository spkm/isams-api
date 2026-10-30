<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\ParentPortal\NotificationsPortal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Notifications\NotificationSettingPublicDto;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/notifications/settings
 */
class SetNotificationsPortalUserNotificationSettingByUserCodeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Notifications\NotificationSettingPublicDto|array<string, mixed>  $notificationSettingPublic
     */
    public function __construct(
        protected NotificationSettingPublicDto|array $notificationSettingPublic,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/settings';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->notificationSettingPublic instanceof Data ? $this->notificationSettingPublic->toArray() : $this->notificationSettingPublic;
    }
}
