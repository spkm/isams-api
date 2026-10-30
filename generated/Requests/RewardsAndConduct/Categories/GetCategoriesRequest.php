<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\Categories;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\Category;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all categories associated with a module type.
 *
 * GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories
 */
class GetCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Category::class;
    public string $resultKey = 'categories';
    protected bool $cacheable = true;

    public function __construct(
        protected int $moduleTypeId,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes/'.rawurlencode((string) $this->moduleTypeId).'/categories';
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
