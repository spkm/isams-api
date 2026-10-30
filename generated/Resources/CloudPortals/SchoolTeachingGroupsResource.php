<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupFormByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupSetByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupsHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups\GetTeachingGroupsRequest;

class SchoolTeachingGroupsResource extends BaseResource
{
    public function getTeachingGroupFormById(string $schoolId, int $id): Response
    {
        return $this->connector->send(new GetTeachingGroupFormByIdRequest($schoolId, $id));
    }

    public function getTeachingGroupSetById(string $schoolId, int $id): Response
    {
        return $this->connector->send(new GetTeachingGroupSetByIdRequest($schoolId, $id));
    }

    public function getTeachingGroups(string $schoolId): Response
    {
        return $this->connector->send(new GetTeachingGroupsRequest($schoolId));
    }

    public function getTeachingGroupsHistory(string $schoolId): Response
    {
        return $this->connector->send(new GetTeachingGroupsHistoryRequest($schoolId));
    }
}
