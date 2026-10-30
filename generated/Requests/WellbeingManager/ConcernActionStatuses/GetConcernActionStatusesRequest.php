<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ActionStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern action status.
 *
 * GET /api/wellbeing/concernactionstatuses
 */
class GetConcernActionStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ActionStatus::class;
    public string $resultKey = 'actionStatuses';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactionstatuses';
    }
}
