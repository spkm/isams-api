<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Medication;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicationLocation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Medication Locations.
 *
 * GET /api/medical/medicationlocations
 */
class GetMedicalMedicationLocationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicationLocation::class;
    public string $resultKey = 'medicationLocations';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/medicationlocations';
    }
}
