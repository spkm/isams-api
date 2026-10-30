<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Agency;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Agency;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all subjects a concern can be shared with.
 *
 * GET /api/wellbeing/agency
 */
class GetAgenciesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Agency::class;
    public string $resultKey = 'agency';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/agency';
    }
}
