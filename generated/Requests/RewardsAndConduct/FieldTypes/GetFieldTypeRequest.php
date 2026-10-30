<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\FieldTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\FieldType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a field type associated with the supplied module type and category.
 *
 * GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories/{categoryId}/fieldTypes/{fieldTypeId}
 */
class GetFieldTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = FieldType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $moduleTypeId,
        protected int $categoryId,
        protected int $fieldTypeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/moduleTypes/'.rawurlencode((string) $this->moduleTypeId).'/categories/'.rawurlencode((string) $this->categoryId).'/fieldTypes/'.rawurlencode((string) $this->fieldTypeId);
    }
}
