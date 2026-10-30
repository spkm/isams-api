<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Gradebooks\Staff\GetGradebookStaffRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StaffResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\Staff>
     * @see \spkm\IsamsApi\Requests\Gradebooks\Staff\GetGradebookStaffRequest
     */
    public function get(int $gradebookId): Collection
    {
        return $this->fetch(new GetGradebookStaffRequest(gradebookId: $gradebookId));
    }
}
