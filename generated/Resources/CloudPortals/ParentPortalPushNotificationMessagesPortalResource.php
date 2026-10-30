<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdateDto;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal\GetPushNotificationMessagesPortalRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal\MarkPushNotificationMessagesPortalAllMessagesAsDeletedRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal\MarkPushNotificationMessagesPortalAllMessagesAsReadRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal\MarkPushNotificationMessagesPortalMessageAsDeletedRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal\MarkPushNotificationMessagesPortalMessageAsReadRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal\UpdatePushNotificationMessagesPortalMessageStatusRequest;

class ParentPortalPushNotificationMessagesPortalResource extends BaseResource
{
    public function getPushNotificationMessagesPortal(?string $read = null): Response
    {
        return $this->connector->send(new GetPushNotificationMessagesPortalRequest($read));
    }

    public function markPushNotificationMessagesPortalAllMessagesAsDeleted(): Response
    {
        return $this->connector->send(new MarkPushNotificationMessagesPortalAllMessagesAsDeletedRequest());
    }

    public function markPushNotificationMessagesPortalAllMessagesAsRead(): Response
    {
        return $this->connector->send(new MarkPushNotificationMessagesPortalAllMessagesAsReadRequest());
    }

    public function markPushNotificationMessagesPortalMessageAsDeleted(string $messageId): Response
    {
        return $this->connector->send(new MarkPushNotificationMessagesPortalMessageAsDeletedRequest($messageId));
    }

    public function markPushNotificationMessagesPortalMessageAsRead(string $messageId): Response
    {
        return $this->connector->send(new MarkPushNotificationMessagesPortalMessageAsReadRequest($messageId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdateDto|array<string, mixed>  $updateDto
     */
    public function updatePushNotificationMessagesPortalMessageStatus(
        int $messageId,
        UserMessageStatusUpdateDto|array $updateDto,
    ): Response {
        return $this->connector->send(new UpdatePushNotificationMessagesPortalMessageStatusRequest($messageId, $updateDto));
    }
}
