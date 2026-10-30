<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Gradebooks\Gradeset;
use spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationRequest;
use spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class GradesetConfigurationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Gradeset>
     * @see \spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetGradesetConfigurationsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationRequest
     */
    public function get(int $gradesetId): Gradeset
    {
        return $this->fetch(new GetGradesetConfigurationRequest(gradesetId: $gradesetId));
    }
}
