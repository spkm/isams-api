<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Billing\Invoice;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/invoices
 */
class GetInvoicesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Invoice::class;
    public string $resultKey = 'invoices';

    public function __construct(
        protected ?bool $excludeCopyBills = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/invoices';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'excludeCopyBills' => $this->excludeCopyBills === null ? null : ($this->excludeCopyBills ? 'true' : 'false'),
        ], fn (mixed $value) => $value !== null);
    }
}
