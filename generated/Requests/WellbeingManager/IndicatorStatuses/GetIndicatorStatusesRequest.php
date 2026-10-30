<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\IndicatorStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\IndicatorStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all indicator statuses.
 *
 * GET /api/wellbeing/indicatorstatuses
 */
class GetIndicatorStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = IndicatorStatus::class;
    public string $resultKey = 'indicatorStatuses';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/indicatorstatuses';
    }
}
