<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration\GetStylingRuleConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration\GetStylingRuleConfigurationsRequest;

class StylingRuleConfigurationResource extends BaseResource
{
    public function getStylingRuleConfiguration(int $stylingRuleId): Response
    {
        return $this->connector->send(new GetStylingRuleConfigurationRequest($stylingRuleId));
    }

    public function getStylingRuleConfigurations(): Response
    {
        return $this->connector->send(new GetStylingRuleConfigurationsRequest());
    }
}
