<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use spkm\IsamsApi\Resources\CloudPortals\Parent\NotificationsResource;
use spkm\IsamsApi\Resources\CloudPortals\Parent\PushNotificationMessagesResource;
use spkm\IsamsApi\Resources\CloudPortals\Parent\PushNotificationResource;
use spkm\IsamsApi\Resources\CloudPortals\Parent\SchoolDirectoryResource;
use spkm\IsamsApi\Resources\IsamsResource;

class ParentResource extends IsamsResource
{
    public function notifications(): NotificationsResource
    {
        return new NotificationsResource($this->connector);
    }

    public function pushNotification(): PushNotificationResource
    {
        return new PushNotificationResource($this->connector);
    }

    public function pushNotificationMessages(): PushNotificationMessagesResource
    {
        return new PushNotificationMessagesResource($this->connector);
    }

    public function schoolDirectory(): SchoolDirectoryResource
    {
        return new SchoolDirectoryResource($this->connector);
    }
}
