<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Medication;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicationType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Medication Types.
 *
 * GET /api/medical/medicationtypes
 */
class GetMedicalMedicationTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicationType::class;
    public string $resultKey = 'medicationTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/medicationtypes';
    }
}
