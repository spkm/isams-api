<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Notifications\GetUserNotificationSettingsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Notifications\PatchPortalNotificationSettingsRequest;
use spkm\IsamsApi\Support\JsonPatch;

class NotificationsResource extends BaseResource
{
    public function getUserSettings(): Response
    {
        return $this->connector->send(new GetUserNotificationSettingsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchSettings(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchPortalNotificationSettingsRequest($patch));
    }
}
