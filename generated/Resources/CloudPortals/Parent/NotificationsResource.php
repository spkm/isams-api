<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use spkm\IsamsApi\Data\Notifications\NotificationSetting;
use spkm\IsamsApi\Data\Notifications\NotificationSettingPublic;
use spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications\GetUserNotificationSettingByUserCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications\SetUserNotificationSettingByUserCodeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class NotificationsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications\GetUserNotificationSettingByUserCodeRequest
     */
    public function getUserSettingByUserCode(): NotificationSetting
    {
        return $this->fetch(new GetUserNotificationSettingByUserCodeRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Notifications\NotificationSettingPublic|array<string, mixed>  $notificationSettingPublic
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications\SetUserNotificationSettingByUserCodeRequest
     */
    public function setUserSettingByUserCode(NotificationSettingPublic|array $notificationSettingPublic): bool
    {
        $this->fetch(new SetUserNotificationSettingByUserCodeRequest(notificationSettingPublic: $notificationSettingPublic));

        return true;
    }
}
