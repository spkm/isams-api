<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Parent\Notifications;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Notifications\NotificationSetting;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/notifications/settings
 */
class GetUserNotificationSettingByUserCodeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = NotificationSetting::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/notifications/settings';
    }
}
