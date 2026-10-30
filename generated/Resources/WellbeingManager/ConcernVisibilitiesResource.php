<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\GetConcernVisibilitiesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\ResetConcernVisibilitiesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityGroupsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConcernVisibilitiesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibility>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\GetConcernVisibilitiesRequest
     */
    public function all(string $schoolId, int $concernId): Collection
    {
        return $this->fetch(new GetConcernVisibilitiesRequest(schoolId: $schoolId, concernId: $concernId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\ResetConcernVisibilitiesRequest
     */
    public function reset(string $schoolId, int $concernId): Created
    {
        return $this->fetch(new ResetConcernVisibilitiesRequest(schoolId: $schoolId, concernId: $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate|array<string, mixed>  $concernVisibility
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityRequest
     */
    public function set(
        string $schoolId,
        int $concernId,
        ConcernVisibilityForCreate|array $concernVisibility,
    ): Created {
        return $this->fetch(new SetConcernVisibilityRequest(schoolId: $schoolId, concernId: $concernId, concernVisibility: $concernVisibility));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch|array<string, mixed>  $concernVisibilityGroups
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityGroupsRequest
     */
    public function setGroups(
        string $schoolId,
        int $concernId,
        ConcernVisibilityGroupsForPatch|array $concernVisibilityGroups,
    ): void {
        $this->fetch(new SetConcernVisibilityGroupsRequest(schoolId: $schoolId, concernId: $concernId, concernVisibilityGroups: $concernVisibilityGroups));
    }
}
