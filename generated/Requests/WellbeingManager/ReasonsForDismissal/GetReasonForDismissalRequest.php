<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissal;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Reason For Dismissal.
 *
 * GET /api/wellbeing/reasonsfordismissal/{id}
 */
class GetReasonForDismissalRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ReasonForDismissal::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/reasonsfordismissal/'.rawurlencode((string) $this->id);
    }
}
