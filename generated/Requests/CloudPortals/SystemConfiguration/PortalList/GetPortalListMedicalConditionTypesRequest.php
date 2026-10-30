<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalConditionType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical condition types.
 *
 * GET /api/portals/list/pupilhealthconditions
 */
class GetPortalListMedicalConditionTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalConditionType::class;
    public string $resultKey = 'medicalConditionTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/pupilhealthconditions';
    }
}
