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
    public function getConcernVisibilities(int $concernId, string $schoolId): Response
    {
        return $this->connector->send(new GetConcernVisibilitiesRequest($concernId, $schoolId));
    }

    public function resetConcernVisibilities(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new ResetConcernVisibilitiesRequest($schoolId, $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate|array<string, mixed>  $visibility
     */
    public function setConcernVisibility(
        string $schoolId,
        int $concernId,
        ConcernVisibilityForCreate|array $visibility,
    ): Response {
        return $this->connector->send(new SetConcernVisibilityRequest($schoolId, $concernId, $visibility));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch|array<string, mixed>  $visibilityGroups
     */
    public function setConcernVisibilityGroups(
        string $schoolId,
        int $concernId,
        ConcernVisibilityGroupsForPatch|array $visibilityGroups,
    ): Response {
        return $this->connector->send(new SetConcernVisibilityGroupsRequest($schoolId, $concernId, $visibilityGroups));
    }
}
