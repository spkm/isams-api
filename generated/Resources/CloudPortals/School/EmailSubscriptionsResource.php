<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\GetEmailSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\PatchEmailSubscriptionToEmailCategoriesRequest;
use spkm\IsamsApi\Support\JsonPatch;

class EmailSubscriptionsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetEmailSubscriptionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchToEmailCategories(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchEmailSubscriptionToEmailCategoriesRequest($patch));
    }
}
