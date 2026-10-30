<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Notifications;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\UserNotificationSettings;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/notifications
 */
class GetUserNotificationSettingsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = UserNotificationSettings::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/notifications';
    }
}
