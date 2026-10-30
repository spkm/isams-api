<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\Invoicing;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Billing\BillingCycle;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets a list of available billing cycles
 *
 * GET /api/billing/invoicing/cycles
 */
class GetBillingCyclesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = BillingCycle::class;
    public string $resultKey = 'billingCycles';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoicing/cycles';
    }
}
