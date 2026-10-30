<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions\GetSmsSubscriptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions\PatchSmsSubscriptionToSmsCategoriesRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SchoolSmsSubscriptionsResource extends BaseResource
{
    public function getSmsSubscriptions(): Response
    {
        return $this->connector->send(new GetSmsSubscriptionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchSmsSubscriptionToSmsCategories(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchSmsSubscriptionToSmsCategoriesRequest($patch));
    }
}
