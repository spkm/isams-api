<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\Staff\GetGradebookStaffRequest;

class StaffResource extends BaseResource
{
    public function getGradebookStaff(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookStaffRequest($gradebookId));
    }
}
