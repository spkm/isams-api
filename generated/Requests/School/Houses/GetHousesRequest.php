<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Houses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\House;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all houses.
 *
 * GET /api/school/houses
 */
class GetHousesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = House::class;
    public string $resultKey = 'houses';
    protected bool $cacheable = true;

    public function __construct(
        protected ?string $houseType = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/houses';
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
