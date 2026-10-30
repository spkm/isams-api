<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Bulletin\Category;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Set a bulletin category
 *
 * PUT /api/bulletin/{bulletinId}/category/{categoryId}
 */
#[Beta]
class UpdateBulletinCategoryRequest extends IsamsRequest
{
    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $bulletinId,
        protected int $categoryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/bulletin/'.rawurlencode((string) $this->bulletinId).'/category/'.rawurlencode((string) $this->categoryId);
    }
}
