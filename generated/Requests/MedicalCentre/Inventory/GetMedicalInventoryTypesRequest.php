<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Inventory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\InventoryType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Inventory Types.
 *
 * GET /api/medical/inventorytypes
 */
class GetMedicalInventoryTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = InventoryType::class;
    public string $resultKey = 'inventoryTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/inventorytypes';
    }
}
