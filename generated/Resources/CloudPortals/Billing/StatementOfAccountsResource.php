<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Billing;

use DateTimeInterface;
use spkm\IsamsApi\Data\Billing\BillingCycle;
use spkm\IsamsApi\Data\Integrations\Statement;
use spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts\GetStatementOfAccountCurrentBillingCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts\GetStatementOfAccountsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StatementOfAccountsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts\GetStatementOfAccountsRequest
     */
    public function all(
        DateTimeInterface|string|null $startDate = null,
        DateTimeInterface|string|null $endDate = null,
        ?string $studentName = null,
    ): Statement {
        return $this->fetch(new GetStatementOfAccountsRequest(startDate: $startDate, endDate: $endDate, studentName: $studentName));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts\GetStatementOfAccountCurrentBillingCycleRequest
     */
    public function getCurrentBillingCycle(): BillingCycle
    {
        return $this->fetch(new GetStatementOfAccountCurrentBillingCycleRequest());
    }
}
