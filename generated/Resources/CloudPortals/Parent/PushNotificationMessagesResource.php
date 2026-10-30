<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdate;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\GetPushNotificationMessagesRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAllMessagesAsDeletedRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAllMessagesAsReadRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAsDeletedRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAsReadRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\UpdatePushNotificationMessageStatusRequest;

class PushNotificationMessagesResource extends BaseResource
{
    public function all(?string $read = null): Response
    {
        return $this->connector->send(new GetPushNotificationMessagesRequest($read));
    }

    public function markAllMessagesAsDeleted(): Response
    {
        return $this->connector->send(new MarkPushNotificationMessageAllMessagesAsDeletedRequest());
    }

    public function markAllMessagesAsRead(): Response
    {
        return $this->connector->send(new MarkPushNotificationMessageAllMessagesAsReadRequest());
    }

    public function markAsDeleted(string $messageId): Response
    {
        return $this->connector->send(new MarkPushNotificationMessageAsDeletedRequest($messageId));
    }

    public function markAsRead(string $messageId): Response
    {
        return $this->connector->send(new MarkPushNotificationMessageAsReadRequest($messageId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdate|array<string, mixed>  $userMessageStatusUpdate
     */
    public function updateStatus(int $messageId, UserMessageStatusUpdate|array $userMessageStatusUpdate): Response
    {
        return $this->connector->send(new UpdatePushNotificationMessageStatusRequest($messageId, $userMessageStatusUpdate));
    }
}
