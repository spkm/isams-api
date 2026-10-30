<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\DocumentCategory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\DocumentCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets all document categories.
 *
 * GET /api/student/documents/categories
 */
class GetStudentDocumentCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DocumentCategory::class;
    public string $resultKey = 'documentCategories';

    public function resolveEndpoint(): string
    {
        return '/api/student/documents/categories';
    }
}
