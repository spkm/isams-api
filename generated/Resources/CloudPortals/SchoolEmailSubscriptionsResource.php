<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\GetEmailSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions\PatchEmailSubscriptionToEmailCategoriesRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SchoolEmailSubscriptionsResource extends BaseResource
{
    public function getEmailSubscriptions(): Response
    {
        return $this->connector->send(new GetEmailSubscriptionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchEmailSubscriptionToEmailCategories(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchEmailSubscriptionToEmailCategoriesRequest($patch));
    }
}
