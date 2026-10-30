<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\ParentPortal\PushNotificationMessagesPortal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\PushNotifications\UserMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/notifications/push/messages
 */
class GetPushNotificationMessagesPortalRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = UserMessage::class;

    public function __construct(
        protected ?string $read = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/push/messages';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'read' => $this->read,
        ], fn (mixed $value) => $value !== null);
    }
}
