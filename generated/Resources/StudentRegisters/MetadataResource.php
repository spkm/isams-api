<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\StudentRegisters\Metadata\GetMetadataRequest;

class MetadataResource extends BaseResource
{
    public function get(int $registerId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetMetadataRequest($registerId, $expand));
    }
}
