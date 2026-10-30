<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Billing\BillingCycle;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/statements/cycle
 */
class GetStatementOfAccountCurrentBillingCycleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = BillingCycle::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/statements/cycle';
    }
}
