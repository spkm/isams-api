<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Visit;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VisitDepartTo;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Visit Depart To Options.
 *
 * GET /api/medical/visitdepartto
 */
class GetMedicalVisitDepartToRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VisitDepartTo::class;
    public string $resultKey = 'visitDepartTo';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/visitdepartto';
    }
}
