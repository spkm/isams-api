<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\FieldValues;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\FieldValue;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a field value associated with the supplied module type, category and field type.
 *
 * GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories/{categoryId}/fieldTypes/{fieldTypeId}/values/{fieldValueId}
 */
class GetFieldValueRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = FieldValue::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $moduleTypeId,
        protected int $categoryId,
        protected int $fieldTypeId,
        protected int $fieldValueId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes/'.rawurlencode((string) $this->moduleTypeId).'/categories/'.rawurlencode((string) $this->categoryId).'/fieldTypes/'.rawurlencode((string) $this->fieldTypeId).'/values/'.rawurlencode((string) $this->fieldValueId);
    }
}
