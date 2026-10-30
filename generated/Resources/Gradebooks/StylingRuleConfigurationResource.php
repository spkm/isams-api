<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Gradebooks\StylingRule;
use spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration\GetStylingRuleConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration\GetStylingRuleConfigurationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StylingRuleConfigurationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\StylingRule>
     * @see \spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration\GetStylingRuleConfigurationsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStylingRuleConfigurationsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration\GetStylingRuleConfigurationRequest
     */
    public function get(int $stylingRuleId): StylingRule
    {
        return $this->fetch(new GetStylingRuleConfigurationRequest(stylingRuleId: $stylingRuleId));
    }
}
