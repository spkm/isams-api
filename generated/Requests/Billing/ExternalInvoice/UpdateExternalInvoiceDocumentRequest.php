<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\ExternalInvoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a new accounting document for an existing invoice.
 *
 * PUT /api/billing/invoice/{invoiceNumber}/document
 */
class UpdateExternalInvoiceDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected string $invoiceNumber,
        protected MultipartValue $document,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoice/'.rawurlencode((string) $this->invoiceNumber).'/document';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [$this->document];
    }
}
