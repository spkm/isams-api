<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\PushNotifications\NotificationSubscription;
use spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivate;
use spkm\IsamsApi\Data\PushNotifications\PrivateNotificationDeviceTokenMapped;
use spkm\IsamsApi\Data\PushNotifications\PushConfigurationMapped;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationChannelsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationConfigRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationUserChannelSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationUserPushDeviceTokenRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\SendDebugPushNotificationRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\SubscribePushNotificationUserToChannelRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\UnsubscribePushNotificationUserFromChannelRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\UpdatePushNotificationUserPushDeviceTokenRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PushNotificationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\PushNotifications\NotificationChannel>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationChannelsRequest
     */
    public function getChannels(): Collection
    {
        return $this->fetch(new GetPushNotificationChannelsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationConfigRequest
     */
    public function getConfig(): ?PushConfigurationMapped
    {
        return $this->fetch(new GetPushNotificationConfigRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\PushNotifications\NotificationUserSubscription>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationUserChannelSubscriptionsRequest
     */
    public function getUserChannelSubscriptions(): Collection
    {
        return $this->fetch(new GetPushNotificationUserChannelSubscriptionsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationUserPushDeviceTokenRequest
     */
    public function getUserPushDeviceToken(): ?PrivateNotificationDeviceTokenMapped
    {
        return $this->fetch(new GetPushNotificationUserPushDeviceTokenRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\SendDebugPushNotificationRequest
     */
    public function sendDebug(): Created
    {
        return $this->fetch(new SendDebugPushNotificationRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscription|array<string, mixed>  $notificationSubscription
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\SubscribePushNotificationUserToChannelRequest
     */
    public function subscribeUserToChannel(NotificationSubscription|array $notificationSubscription): bool
    {
        $this->fetch(new SubscribePushNotificationUserToChannelRequest(notificationSubscription: $notificationSubscription));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscription|array<string, mixed>  $notificationSubscription
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\UnsubscribePushNotificationUserFromChannelRequest
     */
    public function unsubscribeUserFromChannel(NotificationSubscription|array $notificationSubscription): bool
    {
        $this->fetch(new UnsubscribePushNotificationUserFromChannelRequest(notificationSubscription: $notificationSubscription));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivate|array<string, mixed>  $notificationUpdateDevicePrivate
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\UpdatePushNotificationUserPushDeviceTokenRequest
     */
    public function updateUserPushDeviceToken(
        NotificationUpdateDevicePrivate|array $notificationUpdateDevicePrivate,
    ): bool {
        $this->fetch(new UpdatePushNotificationUserPushDeviceTokenRequest(notificationUpdateDevicePrivate: $notificationUpdateDevicePrivate));

        return true;
    }
}
