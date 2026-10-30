<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Exclusions\GetExclusionCancellationReasonsRequest;
use spkm\IsamsApi\Requests\Exclusions\GetExclusionsRequest;

class ExclusionsResource extends BaseResource
{
    public function getExclusionCancellationReasons(): Response
    {
        return $this->connector->send(new GetExclusionCancellationReasonsRequest());
    }

    public function getExclusions(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetExclusionsRequest($page, $pageSize, $filter));
    }
}
