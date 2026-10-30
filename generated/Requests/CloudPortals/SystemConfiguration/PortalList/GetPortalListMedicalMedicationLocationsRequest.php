<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalMedicationLocation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical medication locations.
 *
 * GET /api/portals/list/medicalmedicationlocations
 */
class GetPortalListMedicalMedicationLocationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalMedicationLocation::class;
    public string $resultKey = 'medicalMedicationLocations';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicalmedicationlocations';
    }
}
