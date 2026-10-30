<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\StudentRegisters\Metadata\GetMetadataRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class MetadataResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\StudentRegisters\MetadataField>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Metadata\GetMetadataRequest
     */
    public function get(int $registerId, ?string $expand = null): Collection
    {
        return $this->fetch(new GetMetadataRequest(registerId: $registerId, expand: $expand));
    }
}
