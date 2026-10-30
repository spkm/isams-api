<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\Forms\GetFormsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FormsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Form>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Forms\GetFormsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetFormsRequest());
    }
}
