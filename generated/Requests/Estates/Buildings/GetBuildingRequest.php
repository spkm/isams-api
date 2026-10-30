<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Estates\Buildings;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Estates\Building;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a building.
 *
 * GET /api/estates/buildings/{id}
 */
class GetBuildingRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Building::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/estates/buildings/'.rawurlencode((string) $this->id);
    }
}
