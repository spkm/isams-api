<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\Tags\Categories;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\SystemConfiguration\PrivateTag;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all tags associated with a tag category.
 *
 * GET /api/systemconfiguration/tags/categories/{id}/tags
 */
#[Beta]
class GetTagCategoryTagsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PrivateTag::class;
    public string $resultKey = 'tags';
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/tags/categories/'.rawurlencode((string) $this->id).'/tags';
    }
}
