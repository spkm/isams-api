<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalConditionSeverityType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical condition severity types.
 *
 * GET /api/portals/list/allergyseverity
 */
class GetPortalListMedicalConditionSeverityTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalConditionSeverityType::class;
    public string $resultKey = 'medicalConditionSeverityTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/allergyseverity';
    }
}
