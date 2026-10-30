<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalConsentType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical consent types.
 *
 * GET /api/portals/list/medicalconsenttypes
 */
class GetPortalListMedicalConsentTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalConsentType::class;
    public string $resultKey = 'medicalConsentTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicalconsenttypes';
    }
}
