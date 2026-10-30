<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\School\Terms\GetTermsRequest;

class TermsResource extends BaseResource
{
    public function all(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetTermsRequest($filter));
    }
}
