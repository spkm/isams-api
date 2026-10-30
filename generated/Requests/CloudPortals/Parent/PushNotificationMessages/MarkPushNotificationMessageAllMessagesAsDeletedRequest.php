<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PATCH /api/portals/notifications/push/messages/delete
 */
class MarkPushNotificationMessageAllMessagesAsDeletedRequest extends IsamsRequest
{
    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/messages/delete';
    }
}
