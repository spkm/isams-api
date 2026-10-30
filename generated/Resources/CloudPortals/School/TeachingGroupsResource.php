<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Students\TeachingGroupForm;
use spkm\IsamsApi\Data\Students\TeachingGroupSet;
use spkm\IsamsApi\Data\Students\TeachingGroupsHistoryCollection;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupFormByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupSetByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupsHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TeachingGroupsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\TeachingGroup>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetTeachingGroupsRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupFormByIdRequest
     */
    public function getForm(string $schoolId, int $id): TeachingGroupForm
    {
        return $this->fetch(new GetTeachingGroupFormByIdRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupsHistoryRequest
     */
    public function getHistory(string $schoolId): TeachingGroupsHistoryCollection
    {
        return $this->fetch(new GetTeachingGroupsHistoryRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupSetByIdRequest
     */
    public function getSet(string $schoolId, int $id): TeachingGroupSet
    {
        return $this->fetch(new GetTeachingGroupSetByIdRequest(schoolId: $schoolId, id: $id));
    }
}
