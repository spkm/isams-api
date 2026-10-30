<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration\GetIndicatorConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration\GetIndicatorConfigurationsRequest;

class IndicatorConfigurationResource extends BaseResource
{
    public function getIndicatorConfiguration(int $indicatorId): Response
    {
        return $this->connector->send(new GetIndicatorConfigurationRequest($indicatorId));
    }

    public function getIndicatorConfigurations(): Response
    {
        return $this->connector->send(new GetIndicatorConfigurationsRequest());
    }
}
