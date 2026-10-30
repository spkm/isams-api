<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Injury Type.
 *
 * GET /api/wellbeing/concerninjurytypes/{id}
 */
class GetConcernInjuryTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernInjuryType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concerninjurytypes/'.rawurlencode((string) $this->id);
    }
}
