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
use spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration\ListGroupResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration\ListResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration\StaffContactsResource;

class SystemConfigurationResource extends BaseResource
{
    public function list(): ListResource
    {
        return new ListResource($this->connector);
    }

    public function listGroup(): ListGroupResource
    {
        return new ListGroupResource($this->connector);
    }

    public function staffContacts(): StaffContactsResource
    {
        return new StaffContactsResource($this->connector);
    }

    public function get(): Response
    {
        return $this->connector->send(new GetSystemConfigurationRequest());
    }

    public function getLanguages(): Response
    {
        return $this->connector->send(new GetSystemConfigurationLanguagesRequest());
    }

    public function getNotificationSettings(): Response
    {
        return $this->connector->send(new GetSystemConfigurationSystemNotificationSettingsRequest());
    }

    public function getSecurityOptions(): Response
    {
        return $this->connector->send(new GetSystemConfigurationSecurityOptionsRequest());
    }
}
