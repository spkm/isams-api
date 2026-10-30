<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts\GetStatementOfAccountCurrentBillingCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts\GetStatementOfAccountsRequest;

class BillingStatementOfAccountsResource extends BaseResource
{
    public function getStatementOfAccountCurrentBillingCycle(): Response
    {
        return $this->connector->send(new GetStatementOfAccountCurrentBillingCycleRequest());
    }

    public function getStatementOfAccounts(
        DateTimeInterface|string|null $startDate = null,
        DateTimeInterface|string|null $endDate = null,
        ?string $studentName = null,
    ): Response {
        return $this->connector->send(new GetStatementOfAccountsRequest($startDate, $endDate, $studentName));
    }
}
