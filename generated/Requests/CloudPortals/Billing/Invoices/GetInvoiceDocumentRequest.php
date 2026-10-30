<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Billing\Invoices;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/invoices/{centralFileServiceId}
 */
class GetInvoiceDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $centralFileServiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/invoices/'.rawurlencode((string) $this->centralFileServiceId);
    }
}
