<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Billing\ExternalInvoiceCommunications;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Data\Billing\InvoiceCommunicationForUpdate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a communication for an invoice.
 *
 * POST /api/billing/invoice/{invoiceId}/communications
 */
class CreateExternalInvoiceCommunicationRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Billing\InvoiceCommunicationForUpdate|array<string, mixed>  $data
     */
    public function __construct(
        protected int $invoiceId,
        protected MultipartValue $email,
        protected InvoiceCommunicationForUpdate|array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/billing/invoice/'.rawurlencode((string) $this->invoiceId).'/communications';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [new MultipartValue('email', $this->email->value, $this->email->filename, $this->email->headers), new MultipartValue('data', (string) json_encode($this->data instanceof Data ? $this->data->toArray() : $this->data))];
    }
}
