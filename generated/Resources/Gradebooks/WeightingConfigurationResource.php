<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration\GetWeightingConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration\GetWeightingConfigurationsRequest;

class WeightingConfigurationResource extends BaseResource
{
    public function getWeightingConfiguration(int $weightingId): Response
    {
        return $this->connector->send(new GetWeightingConfigurationRequest($weightingId));
    }

    public function getWeightingConfigurations(): Response
    {
        return $this->connector->send(new GetWeightingConfigurationsRequest());
    }
}
