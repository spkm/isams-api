<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\RewardsAndConduct\Rewards;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\RewardsAndConduct\Reward;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all rewards associated with a student.
 *
 * GET /api/rewardsAndConduct/students/{schoolId}/rewards
 */
class GetRewardsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Reward::class;
    public string $resultKey = 'rewards';

    public function __construct(
        protected string $schoolId,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/rewardsAndConduct/students/'.rawurlencode((string) $this->schoolId).'/rewards';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
