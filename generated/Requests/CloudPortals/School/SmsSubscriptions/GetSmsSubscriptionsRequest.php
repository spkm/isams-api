<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\SmsSubscriptions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\SmsSubscriptionCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/subscriptions/sms
 */
class GetSmsSubscriptionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = SmsSubscriptionCategory::class;
    public string $resultKey = 'subscriptions';

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/subscriptions/sms';
    }
}
