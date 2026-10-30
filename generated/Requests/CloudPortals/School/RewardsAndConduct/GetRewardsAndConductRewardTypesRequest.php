<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\RewardType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/rewardsandconduct/rewardtypes
 */
class GetRewardsAndConductRewardTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RewardType::class;
    public string $resultKey = 'rewardTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/rewardsandconduct/rewardtypes';
    }
}
