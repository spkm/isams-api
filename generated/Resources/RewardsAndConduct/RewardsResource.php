<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\RewardsAndConduct;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\RewardsAndConduct\RewardForCreate;
use spkm\IsamsApi\Data\RewardsAndConduct\RewardForUpdate;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\CreateRewardRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardsRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\UpdateRewardRequest;

class RewardsResource extends BaseResource
{
    public function all(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetRewardsRequest($schoolId, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\RewardsAndConduct\RewardForCreate|array<string, mixed>  $reward
     */
    public function create(string $schoolId, RewardForCreate|array $reward): Response
    {
        return $this->connector->send(new CreateRewardRequest($schoolId, $reward));
    }

    public function get(string $schoolId, int $rewardId): Response
    {
        return $this->connector->send(new GetRewardRequest($schoolId, $rewardId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\RewardsAndConduct\RewardForUpdate|array<string, mixed>  $reward
     */
    public function update(string $schoolId, int $rewardId, RewardForUpdate|array $reward): Response
    {
        return $this->connector->send(new UpdateRewardRequest($schoolId, $rewardId, $reward));
    }
}
