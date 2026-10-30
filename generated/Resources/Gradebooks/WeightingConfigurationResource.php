<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Gradebooks\Weighting;
use spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration\GetWeightingConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration\GetWeightingConfigurationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class WeightingConfigurationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Weighting>
     * @see \spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration\GetWeightingConfigurationsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetWeightingConfigurationsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration\GetWeightingConfigurationRequest
     */
    public function get(int $weightingId): Weighting
    {
        return $this->fetch(new GetWeightingConfigurationRequest(weightingId: $weightingId));
    }
}
