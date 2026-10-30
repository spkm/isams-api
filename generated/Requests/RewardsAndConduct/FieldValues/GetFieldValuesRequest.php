<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\FieldValue;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all field values associated with the supplied module type, category and field type.
 *
 * GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories/{categoryId}/fieldTypes/{fieldTypeId}/values
 */
class GetFieldValuesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = FieldValue::class;
    public string $resultKey = 'fieldValues';
    protected bool $cacheable = true;

    public function __construct(
        protected int $moduleTypeId,
        protected int $categoryId,
        protected int $fieldTypeId,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes/'.rawurlencode((string) $this->moduleTypeId).'/categories/'.rawurlencode((string) $this->categoryId).'/fieldTypes/'.rawurlencode((string) $this->fieldTypeId).'/values';
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
