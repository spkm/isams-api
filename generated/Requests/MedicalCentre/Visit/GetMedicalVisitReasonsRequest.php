<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Visit;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VisitReason;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Visit Reasons.
 *
 * GET /api/medical/visitreasons
 */
class GetMedicalVisitReasonsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VisitReason::class;
    public string $resultKey = 'visitReasons';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/visitreasons';
    }
}
