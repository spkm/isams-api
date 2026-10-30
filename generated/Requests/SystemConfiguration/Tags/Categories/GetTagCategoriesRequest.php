<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\SystemConfiguration\PrivateCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all tags associated with a tag category.
 *
 * GET /api/systemconfiguration/tags/categories
 */
#[Beta]
class GetTagCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PrivateCategory::class;
    public string $resultKey = 'categories';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/tags/categories';
    }
}
