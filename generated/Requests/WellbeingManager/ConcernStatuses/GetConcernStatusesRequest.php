<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern statuses.
 *
 * GET /api/wellbeing/concernstatuses
 */
class GetConcernStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernStatus::class;
    public string $resultKey = 'statuses';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernstatuses';
    }
}
