<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Notifications\NotificationSettingPublic;
use spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications\GetUserNotificationSettingByUserCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications\SetUserNotificationSettingByUserCodeRequest;

class NotificationsResource extends BaseResource
{
    public function getUserSettingByUserCode(): Response
    {
        return $this->connector->send(new GetUserNotificationSettingByUserCodeRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Notifications\NotificationSettingPublic|array<string, mixed>  $notificationSettingPublic
     */
    public function setUserSettingByUserCode(NotificationSettingPublic|array $notificationSettingPublic): Response
    {
        return $this->connector->send(new SetUserNotificationSettingByUserCodeRequest($notificationSettingPublic));
    }
}
