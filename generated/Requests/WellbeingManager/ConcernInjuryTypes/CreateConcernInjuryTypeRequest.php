<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryTypeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a Concern Injury Type.
 *
 * POST /api/wellbeing/concerninjurytypes
 */
class CreateConcernInjuryTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryTypeForCreate|array<string, mixed>  $concernInjuryType
     */
    public function __construct(
        protected ConcernInjuryTypeForCreate|array $concernInjuryType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concerninjurytypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernInjuryType instanceof Data ? $this->concernInjuryType->toArray() : $this->concernInjuryType;
    }
}
