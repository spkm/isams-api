<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Buildings;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Estates\Building;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all buildings.
 *
 * GET /api/estates/buildings
 */
class GetBuildingsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Building::class;
    public string $resultKey = 'buildings';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings';
    }
}
