<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Agency;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Agency;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an agency.
 *
 * GET /api/wellbeing/agency/{id}
 */
class GetAgencyRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Agency::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/agency/'.rawurlencode((string) $this->id);
    }
}
