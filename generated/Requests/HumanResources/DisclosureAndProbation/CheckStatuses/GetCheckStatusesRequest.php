<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\CheckStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\DisclosureProbationCheckStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all disclosure probation check statuses.
 *
 * GET /api/humanresources/disclosureandprobation/checkstatuses
 */
class GetCheckStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DisclosureProbationCheckStatus::class;
    public string $resultKey = 'disclosureProbationCheckStatuses';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/disclosureandprobation/checkstatuses';
    }
}
