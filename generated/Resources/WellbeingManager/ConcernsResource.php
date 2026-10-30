<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\WellbeingManager\Concerns\GetConcernsRequest;

class ConcernsResource extends BaseResource
{
    public function getConcerns(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetConcernsRequest($page, $pageSize, $filter));
    }
}
