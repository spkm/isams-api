<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Visit;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VisitLocation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Visit Locations.
 *
 * GET /api/medical/visitlocations
 */
class GetMedicalVisitLocationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VisitLocation::class;
    public string $resultKey = 'visitLocations';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/visitlocations';
    }
}
