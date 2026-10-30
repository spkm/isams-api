<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\FieldType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all field types associated with the supplied module type and category.
 *
 * GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories/{categoryId}/fieldTypes
 */
class GetFieldTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = FieldType::class;
    public string $resultKey = 'fieldTypes';
    protected bool $cacheable = true;

    public function __construct(
        protected int $moduleTypeId,
        protected int $categoryId,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes/'.rawurlencode((string) $this->moduleTypeId).'/categories/'.rawurlencode((string) $this->categoryId).'/fieldTypes';
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
