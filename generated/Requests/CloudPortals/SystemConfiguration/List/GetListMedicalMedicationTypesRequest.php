<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalMedicationType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical medication types.
 *
 * GET /api/portals/list/medicalmedicationtypes
 */
class GetListMedicalMedicationTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalMedicationType::class;
    public string $resultKey = 'medicalMedicationTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicalmedicationtypes';
    }
}
