<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Indicators;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\IndicatorForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an indicator.
 *
 * POST /api/wellbeing/students/{schoolId}/indicators
 */
class CreateIndicatorRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\IndicatorForCreate|array<string, mixed>  $indicator
     */
    public function __construct(
        protected string $schoolId,
        protected IndicatorForCreate|array $indicator,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/indicators';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->indicator instanceof Data ? $this->indicator->toArray() : $this->indicator;
    }
}
