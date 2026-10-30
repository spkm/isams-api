<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\ExternalInvoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Billing\ExternalAccountsInvoiceForUpdate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates or updates the supplied external invoice data
 *
 * PUT /api/billing/invoice/{invoiceNumber}
 */
class UpdateExternalInvoiceRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Billing\ExternalAccountsInvoiceForUpdate|array<string, mixed>  $externalAccountsInvoice
     */
    public function __construct(
        protected string $invoiceNumber,
        protected ExternalAccountsInvoiceForUpdate|array $externalAccountsInvoice,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoice/'.rawurlencode((string) $this->invoiceNumber);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->externalAccountsInvoice instanceof Data ? $this->externalAccountsInvoice->toArray() : $this->externalAccountsInvoice;
    }
}
