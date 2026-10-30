<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use spkm\IsamsApi\Data\PushNotifications\UserMessage;
use spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdate;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\GetPushNotificationMessagesRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAllMessagesAsDeletedRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAllMessagesAsReadRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAsDeletedRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAsReadRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\UpdatePushNotificationMessageStatusRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PushNotificationMessagesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\GetPushNotificationMessagesRequest
     */
    public function all(?string $read = null): ?UserMessage
    {
        return $this->fetch(new GetPushNotificationMessagesRequest(read: $read));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAllMessagesAsDeletedRequest
     */
    public function markAllMessagesAsDeleted(): bool
    {
        $this->fetch(new MarkPushNotificationMessageAllMessagesAsDeletedRequest());

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAllMessagesAsReadRequest
     */
    public function markAllMessagesAsRead(): bool
    {
        $this->fetch(new MarkPushNotificationMessageAllMessagesAsReadRequest());

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAsDeletedRequest
     */
    public function markAsDeleted(string $messageId): bool
    {
        $this->fetch(new MarkPushNotificationMessageAsDeletedRequest(messageId: $messageId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\MarkPushNotificationMessageAsReadRequest
     */
    public function markAsRead(string $messageId): bool
    {
        $this->fetch(new MarkPushNotificationMessageAsReadRequest(messageId: $messageId));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdate|array<string, mixed>  $userMessageStatusUpdate
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages\UpdatePushNotificationMessageStatusRequest
     */
    public function updateStatus(int $messageId, UserMessageStatusUpdate|array $userMessageStatusUpdate): bool
    {
        $this->fetch(new UpdatePushNotificationMessageStatusRequest(messageId: $messageId, userMessageStatusUpdate: $userMessageStatusUpdate));

        return true;
    }
}
