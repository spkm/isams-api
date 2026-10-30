<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Indicators;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an indicator.
 *
 * POST /api/wellbeing/indicators/delete
 */
class DeleteIndicatorsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $ids
     */
    public function __construct(
        protected array $ids,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/indicators/delete';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->ids;
    }
}
