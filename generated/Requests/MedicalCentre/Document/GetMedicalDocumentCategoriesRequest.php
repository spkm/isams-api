<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Document;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\DocumentCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Document Categories.
 *
 * GET /api/medical/documentcategories
 */
class GetMedicalDocumentCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DocumentCategory::class;
    public string $resultKey = 'documentCategories';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/documentcategories';
    }
}
