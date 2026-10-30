<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Indicators;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Indicator;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an indicator.
 *
 * GET /api/wellbeing/students/{schoolId}/indicators/{id}
 */
class GetIndicatorRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Indicator::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/indicators/'.rawurlencode((string) $this->id);
    }
}
