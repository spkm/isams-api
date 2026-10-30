<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\PushNotifications\NotificationSubscription;
use spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivate;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationChannelsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationConfigRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationUserChannelSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\GetPushNotificationUserPushDeviceTokenRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\SendDebugPushNotificationRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\SubscribePushNotificationUserToChannelRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\UnsubscribePushNotificationUserFromChannelRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotification\UpdatePushNotificationUserPushDeviceTokenRequest;

class PushNotificationResource extends BaseResource
{
    public function getChannels(): Response
    {
        return $this->connector->send(new GetPushNotificationChannelsRequest());
    }

    public function getConfig(): Response
    {
        return $this->connector->send(new GetPushNotificationConfigRequest());
    }

    public function getUserChannelSubscriptions(): Response
    {
        return $this->connector->send(new GetPushNotificationUserChannelSubscriptionsRequest());
    }

    public function getUserPushDeviceToken(): Response
    {
        return $this->connector->send(new GetPushNotificationUserPushDeviceTokenRequest());
    }

    public function sendDebug(): Response
    {
        return $this->connector->send(new SendDebugPushNotificationRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscription|array<string, mixed>  $notificationSubscription
     */
    public function subscribeUserToChannel(NotificationSubscription|array $notificationSubscription): Response
    {
        return $this->connector->send(new SubscribePushNotificationUserToChannelRequest($notificationSubscription));
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscription|array<string, mixed>  $notificationSubscription
     */
    public function unsubscribeUserFromChannel(NotificationSubscription|array $notificationSubscription): Response
    {
        return $this->connector->send(new UnsubscribePushNotificationUserFromChannelRequest($notificationSubscription));
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivate|array<string, mixed>  $notificationUpdateDevicePrivate
     */
    public function updateUserPushDeviceToken(
        NotificationUpdateDevicePrivate|array $notificationUpdateDevicePrivate,
    ): Response {
        return $this->connector->send(new UpdatePushNotificationUserPushDeviceTokenRequest($notificationUpdateDevicePrivate));
    }
}
