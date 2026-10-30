<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Stock;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\StockReason;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Stock Reason.
 *
 * GET /api/medical/stockreasons
 */
class GetMedicalStockReasonsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StockReason::class;
    public string $resultKey = 'stockReasons';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/stockreasons';
    }
}
