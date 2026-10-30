<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions\GetSmsSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions\PatchSmsSubscriptionToSmsCategoriesRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class SmsSubscriptionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\SmsSubscriptionCategory>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions\GetSmsSubscriptionsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetSmsSubscriptionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions\PatchSmsSubscriptionToSmsCategoriesRequest
     */
    public function patchToSmsCategories(JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchSmsSubscriptionToSmsCategoriesRequest(patch: $patch));

        return true;
    }
}
