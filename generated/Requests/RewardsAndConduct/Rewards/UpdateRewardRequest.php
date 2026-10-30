<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\Rewards;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\RewardsAndConduct\RewardForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a reward for a student.
 *
 * PUT /api/rewardsAndConduct/students/{schoolId}/rewards/{rewardId}
 */
class UpdateRewardRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\RewardsAndConduct\RewardForUpdate|array<string, mixed>  $reward
     */
    public function __construct(
        protected string $schoolId,
        protected int $rewardId,
        protected RewardForUpdate|array $reward,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/students/'.rawurlencode((string) $this->schoolId).'/rewards/'.rawurlencode((string) $this->rewardId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->reward instanceof Data ? $this->reward->toArray() : $this->reward;
    }
}
