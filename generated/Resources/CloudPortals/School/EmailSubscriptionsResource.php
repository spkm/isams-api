<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\GetEmailSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\PatchEmailSubscriptionToEmailCategoriesRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class EmailSubscriptionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\EmailSubscriptionCategory>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\GetEmailSubscriptionsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetEmailSubscriptionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\PatchEmailSubscriptionToEmailCategoriesRequest
     */
    public function patchToEmailCategories(JsonPatch|array $patch): void
    {
        $this->fetch(new PatchEmailSubscriptionToEmailCategoriesRequest(patch: $patch));
    }
}
