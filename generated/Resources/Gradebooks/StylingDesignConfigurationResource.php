<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Gradebooks\StylingDesign;
use spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration\GetStylingDesignConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration\GetStylingDesignConfigurationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StylingDesignConfigurationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\StylingDesign>
     * @see \spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration\GetStylingDesignConfigurationsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStylingDesignConfigurationsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration\GetStylingDesignConfigurationRequest
     */
    public function get(int $stylingDesignId): StylingDesign
    {
        return $this->fetch(new GetStylingDesignConfigurationRequest(stylingDesignId: $stylingDesignId));
    }
}
