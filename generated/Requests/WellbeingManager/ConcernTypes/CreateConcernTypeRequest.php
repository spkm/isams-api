<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern type.
 *
 * POST /api/wellbeing/concerntypes
 */
class CreateConcernTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate|array<string, mixed>  $concernType
     */
    public function __construct(
        protected ConcernTypeForCreate|array $concernType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concerntypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernType instanceof Data ? $this->concernType->toArray() : $this->concernType;
    }
}
