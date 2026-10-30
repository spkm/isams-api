<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Billing;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Billing\Invoicing\DownloadInvoiceRunReportRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\GetBillingCycleInvoiceRunsRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\GetBillingCyclesRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\GetInvoiceRunInvoicesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class InvoicingResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Billing\Invoicing\DownloadInvoiceRunReportRequest
     */
    public function downloadInvoiceRunReport(int $id): File
    {
        return $this->fetch(new DownloadInvoiceRunReportRequest(id: $id));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Billing\InvoiceRun>
     * @see \spkm\IsamsApi\Requests\Billing\Invoicing\GetBillingCycleInvoiceRunsRequest
     */
    public function getBillingCycleInvoiceRuns(int $id): Collection
    {
        return $this->fetch(new GetBillingCycleInvoiceRunsRequest(id: $id));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Billing\BillingCycle>
     * @see \spkm\IsamsApi\Requests\Billing\Invoicing\GetBillingCyclesRequest
     */
    public function getBillingCycles(): Collection
    {
        return $this->fetch(new GetBillingCyclesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Billing\InvoiceRunInvoice>
     * @see \spkm\IsamsApi\Requests\Billing\Invoicing\GetInvoiceRunInvoicesRequest
     */
    public function getInvoiceRunInvoices(int $id): Collection
    {
        return $this->fetch(new GetInvoiceRunInvoicesRequest(id: $id));
    }
}
