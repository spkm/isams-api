<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\GirfecAreas;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\PastoralConcernArea;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all Girfec areas.
 *
 * GET /api/wellbeing/girfecareas
 */
class GetGirfecAreasRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PastoralConcernArea::class;
    public string $resultKey = 'concernAreas';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/girfecareas';
    }
}
