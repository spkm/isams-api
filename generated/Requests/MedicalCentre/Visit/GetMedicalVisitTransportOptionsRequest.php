<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Visit;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VisitTransportOption;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Transport Options.
 *
 * GET /api/medical/visittransportoptions
 */
class GetMedicalVisitTransportOptionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VisitTransportOption::class;
    public string $resultKey = 'visitTransportOptions';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/visittransportoptions';
    }
}
