<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Billing\Deposits;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Billing\DepositCollection;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all deposit history.
 *
 * GET /api/portals/admissions/deposits
 */
class GetDepositBySchoolIdsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = DepositCollection::class;

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function __construct(
        protected ?array $schoolIds = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/deposits';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'schoolIds' => $this->schoolIds,
        ], fn (mixed $value) => $value !== null);
    }
}
