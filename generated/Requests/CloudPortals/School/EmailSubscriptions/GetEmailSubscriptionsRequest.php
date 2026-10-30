<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\EmailSubscriptions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\EmailSubscriptionCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/subscriptions/emails
 */
class GetEmailSubscriptionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmailSubscriptionCategory::class;
    public string $resultKey = 'subscriptions';

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/subscriptions/emails';
    }
}
