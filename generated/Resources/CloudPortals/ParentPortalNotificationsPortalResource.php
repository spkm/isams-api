<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Notifications\NotificationSettingPublicDto;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\NotificationsPortal\GetNotificationsPortalUserNotificationSettingByUserCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\NotificationsPortal\SetNotificationsPortalUserNotificationSettingByUserCodeRequest;

class ParentPortalNotificationsPortalResource extends BaseResource
{
    public function getNotificationsPortalUserNotificationSettingByUserCode(): Response
    {
        return $this->connector->send(new GetNotificationsPortalUserNotificationSettingByUserCodeRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Notifications\NotificationSettingPublicDto|array<string, mixed>  $notificationSettingPublic
     */
    public function setNotificationsPortalUserNotificationSettingByUserCode(
        NotificationSettingPublicDto|array $notificationSettingPublic,
    ): Response {
        return $this->connector->send(new SetNotificationsPortalUserNotificationSettingByUserCodeRequest($notificationSettingPublic));
    }
}
