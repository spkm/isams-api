<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration\GetTransposeConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration\GetTransposeConfigurationsRequest;

class TransposeConfigurationResource extends BaseResource
{
    public function getTransposeConfiguration(int $transposeId): Response
    {
        return $this->connector->send(new GetTransposeConfigurationRequest($transposeId));
    }

    public function getTransposeConfigurations(): Response
    {
        return $this->connector->send(new GetTransposeConfigurationsRequest());
    }
}
