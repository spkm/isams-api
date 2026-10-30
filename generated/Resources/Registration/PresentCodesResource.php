<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Registration\PresentCodes\GetPresentCodesRequest;

class PresentCodesResource extends BaseResource
{
    public function getPresentCodes(): Response
    {
        return $this->connector->send(new GetPresentCodesRequest());
    }
}
