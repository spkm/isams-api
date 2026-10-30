<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalDocumentCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical document categories.
 *
 * GET /api/portals/list/medicaldocumentcategories
 */
class GetPortalListMedicalDocumentCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalDocumentCategory::class;
    public string $resultKey = 'medicalDocumentCategories';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicaldocumentcategories';
    }
}
