<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\PastoralConcernAreaForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern area.
 *
 * POST /api/wellbeing/concernareas
 */
class CreateConcernAreaRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralConcernAreaForCreate|array<string, mixed>  $pastoralConcernArea
     */
    public function __construct(
        protected PastoralConcernAreaForCreate|array $pastoralConcernArea,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernareas';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->pastoralConcernArea instanceof Data ? $this->pastoralConcernArea->toArray() : $this->pastoralConcernArea;
    }
}
