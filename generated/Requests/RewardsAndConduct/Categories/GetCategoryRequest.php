<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\Categories;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\Category;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a category associated with a module type.
 *
 * GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories/{categoryId}
 */
class GetCategoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Category::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $moduleTypeId,
        protected int $categoryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes/'.rawurlencode((string) $this->moduleTypeId).'/categories/'.rawurlencode((string) $this->categoryId);
    }
}
