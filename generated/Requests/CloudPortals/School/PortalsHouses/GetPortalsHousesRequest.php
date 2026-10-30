<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PortalsHouses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\House;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/school/houses
 */
class GetPortalsHousesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = House::class;
    public string $resultKey = 'houses';

    public function __construct(
        protected ?string $houseType = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/school/houses';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'houseType' => $this->houseType,
        ], fn (mixed $value) => $value !== null);
    }
}
