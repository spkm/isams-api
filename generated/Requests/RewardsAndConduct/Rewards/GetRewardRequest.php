<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\Rewards;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\Reward;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's reward.
 *
 * GET /api/rewardsAndConduct/students/{schoolId}/rewards/{rewardId}
 */
class GetRewardRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Reward::class;

    public function __construct(
        protected string $schoolId,
        protected int $rewardId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/students/'.rawurlencode((string) $this->schoolId).'/rewards/'.rawurlencode((string) $this->rewardId);
    }
}
