<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\Rewards;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\RewardsAndConduct\RewardForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a reward for a student.
 *
 * POST /api/rewardsAndConduct/students/{schoolId}/rewards
 */
class CreateRewardRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\RewardsAndConduct\RewardForCreate|array<string, mixed>  $reward
     */
    public function __construct(
        protected string $schoolId,
        protected RewardForCreate|array $reward,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/students/'.rawurlencode((string) $this->schoolId).'/rewards';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->reward instanceof Data ? $this->reward->toArray() : $this->reward;
    }
}
