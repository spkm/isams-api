<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\GetConcernVisibilitiesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\ResetConcernVisibilitiesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityGroupsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityRequest;

class ConcernVisibilitiesResource extends BaseResource
{
    public function all(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new GetConcernVisibilitiesRequest($schoolId, $concernId));
    }

    public function reset(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new ResetConcernVisibilitiesRequest($schoolId, $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate|array<string, mixed>  $concernVisibility
     */
    public function set(
        string $schoolId,
        int $concernId,
        ConcernVisibilityForCreate|array $concernVisibility,
    ): Response {
        return $this->connector->send(new SetConcernVisibilityRequest($schoolId, $concernId, $concernVisibility));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch|array<string, mixed>  $concernVisibilityGroups
     */
    public function setGroups(
        string $schoolId,
        int $concernId,
        ConcernVisibilityGroupsForPatch|array $concernVisibilityGroups,
    ): Response {
        return $this->connector->send(new SetConcernVisibilityGroupsRequest($schoolId, $concernId, $concernVisibilityGroups));
    }
}
