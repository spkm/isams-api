<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\RewardsAndConduct;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\Reward;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/rewardsandconduct/rewardtypes/{typeId}
 */
class GetRewardsAndConductRewardsByTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Reward::class;
    public string $resultKey = 'rewards';

    public function __construct(
        protected string $schoolId,
        protected int $typeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/rewardsandconduct/rewardtypes/'.rawurlencode((string) $this->typeId);
    }
}
