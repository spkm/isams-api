<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalVaccinationType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical vaccination types.
 *
 * GET /api/portals/list/medicalvaccinationtypes
 */
class GetListMedicalVaccinationTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalVaccinationType::class;
    public string $resultKey = 'medicalVaccinationTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicalvaccinationtypes';
    }
}
