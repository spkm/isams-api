<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\FlagTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\FlagTypeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a flag type.
 *
 * POST /api/wellbeing/flagtypes
 */
class CreateFlagTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\FlagTypeForCreate|array<string, mixed>  $flagType
     */
    public function __construct(
        protected FlagTypeForCreate|array $flagType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/flagtypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->flagType instanceof Data ? $this->flagType->toArray() : $this->flagType;
    }
}
