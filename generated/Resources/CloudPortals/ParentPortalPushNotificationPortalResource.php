<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\PushNotifications\NotificationSubscriptionDto;
use spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivateDto;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\GetPushNotificationPortalChannelsRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\GetPushNotificationPortalConfigRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\GetPushNotificationPortalUserChannelSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\GetPushNotificationPortalUserPushDeviceTokenRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\SendPushNotificationPortalDebugPushNotificationRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\SubscribePushNotificationPortalUserToChannelRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\UnsubscribePushNotificationUserFromChannelRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationPortal\UpdatePushNotificationPortalUserPushDeviceTokenRequest;

class ParentPortalPushNotificationPortalResource extends BaseResource
{
    public function getPushNotificationPortalChannels(): Response
    {
        return $this->connector->send(new GetPushNotificationPortalChannelsRequest());
    }

    public function getPushNotificationPortalConfig(): Response
    {
        return $this->connector->send(new GetPushNotificationPortalConfigRequest());
    }

    public function getPushNotificationPortalUserChannelSubscriptions(): Response
    {
        return $this->connector->send(new GetPushNotificationPortalUserChannelSubscriptionsRequest());
    }

    public function getPushNotificationPortalUserPushDeviceToken(): Response
    {
        return $this->connector->send(new GetPushNotificationPortalUserPushDeviceTokenRequest());
    }

    public function sendPushNotificationPortalDebugPushNotification(): Response
    {
        return $this->connector->send(new SendPushNotificationPortalDebugPushNotificationRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscriptionDto|array<string, mixed>  $subscribe
     */
    public function subscribePushNotificationPortalUserToChannel(
        NotificationSubscriptionDto|array $subscribe,
    ): Response {
        return $this->connector->send(new SubscribePushNotificationPortalUserToChannelRequest($subscribe));
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationSubscriptionDto|array<string, mixed>  $subscribe
     */
    public function unsubscribePushNotificationUserFromChannel(NotificationSubscriptionDto|array $subscribe): Response
    {
        return $this->connector->send(new UnsubscribePushNotificationUserFromChannelRequest($subscribe));
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\NotificationUpdateDevicePrivateDto|array<string, mixed>  $updateDeviceTokenPrivate
     */
    public function updatePushNotificationPortalUserPushDeviceToken(
        NotificationUpdateDevicePrivateDto|array $updateDeviceTokenPrivate,
    ): Response {
        return $this->connector->send(new UpdatePushNotificationPortalUserPushDeviceTokenRequest($updateDeviceTokenPrivate));
    }
}
