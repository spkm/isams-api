<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Visit;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VisitArriveFrom;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Visit Arrive From Options.
 *
 * GET /api/medical/visitarrivefrom
 */
class GetMedicalVisitArriveFromRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VisitArriveFrom::class;
    public string $resultKey = 'visitArriveFrom';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/visitarrivefrom';
    }
}
