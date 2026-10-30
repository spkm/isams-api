<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\CloudPortals\UserNotificationSettings;
use spkm\IsamsApi\Requests\CloudPortals\School\Notifications\GetUserNotificationSettingsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Notifications\PatchPortalNotificationSettingsRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class NotificationsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Notifications\GetUserNotificationSettingsRequest
     */
    public function getUserSettings(): ?UserNotificationSettings
    {
        return $this->fetch(new GetUserNotificationSettingsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Notifications\PatchPortalNotificationSettingsRequest
     */
    public function patchSettings(JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchPortalNotificationSettingsRequest(patch: $patch));

        return true;
    }
}
