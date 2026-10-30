<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernActionTypeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern action type.
 *
 * POST /api/wellbeing/concernactiontypes
 */
class CreateConcernActionTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernActionTypeForCreate|array<string, mixed>  $concernActionType
     */
    public function __construct(
        protected ConcernActionTypeForCreate|array $concernActionType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactiontypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernActionType instanceof Data ? $this->concernActionType->toArray() : $this->concernActionType;
    }
}
