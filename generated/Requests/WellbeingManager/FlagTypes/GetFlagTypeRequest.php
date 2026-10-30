<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\FlagTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlagType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a flag type.
 *
 * GET /api/wellbeing/flagtypes/{id}
 */
class GetFlagTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PastoralFlagType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/flagtypes/'.rawurlencode((string) $this->id);
    }
}
