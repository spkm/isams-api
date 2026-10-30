<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Gradebooks\Indicator;
use spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration\GetIndicatorConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration\GetIndicatorConfigurationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class IndicatorConfigurationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Indicator>
     * @see \spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration\GetIndicatorConfigurationsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetIndicatorConfigurationsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration\GetIndicatorConfigurationRequest
     */
    public function get(int $indicatorId): Indicator
    {
        return $this->fetch(new GetIndicatorConfigurationRequest(indicatorId: $indicatorId));
    }
}
