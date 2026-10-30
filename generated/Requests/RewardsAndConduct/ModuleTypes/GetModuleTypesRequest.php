<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\ModuleTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\ModuleType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all module types.
 *
 * GET /api/rewardsAndConduct/moduleTypes
 */
class GetModuleTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ModuleType::class;
    public string $resultKey = 'moduleTypes';
    protected bool $cacheable = true;

    public function __construct(
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
