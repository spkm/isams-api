<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Registration\AbsenceCodes\GetAbsenceCodesRequest;

class AbsenceCodesResource extends BaseResource
{
    public function getAbsenceCodes(): Response
    {
        return $this->connector->send(new GetAbsenceCodesRequest());
    }
}
