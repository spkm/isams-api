<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Indicators;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates multiple indicators.
 *
 * PATCH /api/wellbeing/indicators/dismiss
 */
class DismissIndicatorsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate|array<string, mixed>  $indicators
     */
    public function __construct(
        protected DismissIndicatorsCollectionForUpdate|array $indicators,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/indicators/dismiss';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->indicators instanceof Data ? $this->indicators->toArray() : $this->indicators;
    }
}
