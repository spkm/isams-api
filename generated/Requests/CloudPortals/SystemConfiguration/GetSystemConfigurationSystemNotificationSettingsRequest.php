<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\SystemNotificationSettings;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/systemconfiguration/notifications
 */
class GetSystemConfigurationSystemNotificationSettingsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SystemNotificationSettings::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/systemconfiguration/notifications';
    }
}
