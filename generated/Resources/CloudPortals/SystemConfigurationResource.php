<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\CloudPortals\SystemNotificationSettings;
use spkm\IsamsApi\Data\SystemConfiguration\PortalSystemConfiguration;
use spkm\IsamsApi\Data\SystemConfiguration\SecurityOptions;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationLanguagesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationSecurityOptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationSystemNotificationSettingsRequest;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration\ListGroupResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration\ListResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration\StaffContactsResource;
use spkm\IsamsApi\Resources\IsamsResource;

class SystemConfigurationResource extends IsamsResource
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

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationRequest
     */
    public function get(): ?PortalSystemConfiguration
    {
        return $this->fetch(new GetSystemConfigurationRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\Language>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationLanguagesRequest
     */
    public function getLanguages(): Collection
    {
        return $this->fetch(new GetSystemConfigurationLanguagesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationSystemNotificationSettingsRequest
     */
    public function getNotificationSettings(): ?SystemNotificationSettings
    {
        return $this->fetch(new GetSystemConfigurationSystemNotificationSettingsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\GetSystemConfigurationSecurityOptionsRequest
     */
    public function getSecurityOptions(): ?SecurityOptions
    {
        return $this->fetch(new GetSystemConfigurationSecurityOptionsRequest());
    }
}
