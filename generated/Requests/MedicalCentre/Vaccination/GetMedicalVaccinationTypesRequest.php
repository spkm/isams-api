<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Vaccination;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalVaccinationType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Vaccination Types.
 *
 * GET /api/medical/vaccinationtypes
 */
class GetMedicalVaccinationTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalVaccinationType::class;
    public string $resultKey = 'vaccinationTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/vaccinationtypes';
    }
}
