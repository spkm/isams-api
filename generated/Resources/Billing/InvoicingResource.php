<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Billing;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Billing\Invoicing\DownloadInvoiceRunReportRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\GetBillingCycleInvoiceRunsRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\GetBillingCyclesRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\GetInvoiceRunInvoicesRequest;

class InvoicingResource extends BaseResource
{
    public function downloadInvoiceRunReport(int $id): Response
    {
        return $this->connector->send(new DownloadInvoiceRunReportRequest($id));
    }

    public function getBillingCycleInvoiceRuns(int $id): Response
    {
        return $this->connector->send(new GetBillingCycleInvoiceRunsRequest($id));
    }

    public function getBillingCycles(): Response
    {
        return $this->connector->send(new GetBillingCyclesRequest());
    }

    public function getInvoiceRunInvoices(int $id): Response
    {
        return $this->connector->send(new GetInvoiceRunInvoicesRequest($id));
    }
}
