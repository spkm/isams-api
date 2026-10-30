<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Gradebooks\Transpose;
use spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration\GetTransposeConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration\GetTransposeConfigurationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TransposeConfigurationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Transpose>
     * @see \spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration\GetTransposeConfigurationsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetTransposeConfigurationsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration\GetTransposeConfigurationRequest
     */
    public function get(int $transposeId): Transpose
    {
        return $this->fetch(new GetTransposeConfigurationRequest(transposeId: $transposeId));
    }
}
