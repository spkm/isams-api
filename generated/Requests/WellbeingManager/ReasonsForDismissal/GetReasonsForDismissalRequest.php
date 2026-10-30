<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissal;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all reasons for dismissal.
 *
 * GET /api/wellbeing/reasonsfordismissal
 */
class GetReasonsForDismissalRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ReasonForDismissal::class;
    public string $resultKey = 'reasonsForDismissal';

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/reasonsfordismissal';
    }
}
