<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\Periods;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\RegistrationPeriod;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a registration period.
 *
 * GET /api/registration/periods/{id}
 */
class GetRegistrationPeriodRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = RegistrationPeriod::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/periods/'.rawurlencode((string) $this->id);
    }
}
