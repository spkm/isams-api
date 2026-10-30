<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\DocumentCategory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\DocumentCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets all document categories.
 *
 * GET /api/admissions/documents/categories
 */
class GetApplicantDocumentCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DocumentCategory::class;
    public string $resultKey = 'documentCategories';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/admissions/documents/categories';
    }
}
