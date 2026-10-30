<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration\GetStylingDesignConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration\GetStylingDesignConfigurationsRequest;

class StylingDesignConfigurationResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetStylingDesignConfigurationsRequest());
    }

    public function get(int $stylingDesignId): Response
    {
        return $this->connector->send(new GetStylingDesignConfigurationRequest($stylingDesignId));
    }
}
