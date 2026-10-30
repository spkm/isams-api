<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationsRequest;

class GradesetConfigurationResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetGradesetConfigurationsRequest());
    }

    public function get(int $gradesetId): Response
    {
        return $this->connector->send(new GetGradesetConfigurationRequest($gradesetId));
    }
}
