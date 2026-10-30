<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\PushNotificationMessages;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PATCH /api/portals/notifications/push/messages/{messageId}/status
 */
class UpdatePushNotificationMessageStatusRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\PushNotifications\UserMessageStatusUpdate|array<string, mixed>  $userMessageStatusUpdate
     */
    public function __construct(
        protected int $messageId,
        protected UserMessageStatusUpdate|array $userMessageStatusUpdate,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/messages/'.rawurlencode((string) $this->messageId).'/status';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->userMessageStatusUpdate instanceof Data ? $this->userMessageStatusUpdate->toArray() : $this->userMessageStatusUpdate;
    }
}
