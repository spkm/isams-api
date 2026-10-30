<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Houses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\House;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a house.
 *
 * GET /api/school/houses/{id}
 */
class GetHouseRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = House::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/houses/'.rawurlencode((string) $this->id);
    }
}
