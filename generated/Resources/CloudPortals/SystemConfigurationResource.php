<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationLanguagesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationSecurityOptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationSystemNotificationSettingsRequest;

class SystemConfigurationResource extends BaseResource
{
    public function getSystemConfiguration(): Response
    {
        return $this->connector->send(new GetSystemConfigurationRequest());
    }

    public function getSystemConfigurationLanguages(): Response
    {
        return $this->connector->send(new GetSystemConfigurationLanguagesRequest());
    }

    public function getSystemConfigurationSecurityOptions(): Response
    {
        return $this->connector->send(new GetSystemConfigurationSecurityOptionsRequest());
    }

    public function getSystemConfigurationSystemNotificationSettings(): Response
    {
        return $this->connector->send(new GetSystemConfigurationSystemNotificationSettingsRequest());
    }
}
