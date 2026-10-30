<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PATCH /api/portals/notifications/push/messages/{messageId}/read
 */
class MarkPushNotificationMessageAsReadRequest extends IsamsRequest
{
    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected string $messageId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/messages/'.rawurlencode((string) $this->messageId).'/read';
    }
}
