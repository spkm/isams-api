<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Exclusions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Exclusions\ReasonForCancellation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all reasons for cancellation.
 *
 * GET /api/exclusions/cancellationreasons
 */
class GetExclusionCancellationReasonsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ReasonForCancellation::class;
    public string $resultKey = 'reasonsForCancellation';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/exclusions/cancellationreasons';
    }
}
