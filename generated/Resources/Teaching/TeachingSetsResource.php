<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Teaching\GetStudentsInSetBySetidRequest;
use spkm\IsamsApi\Requests\Teaching\GetTeachingSetsRequest;
use spkm\IsamsApi\Requests\Teaching\TeachingSets\AddStudentToTeachingSetRequest;
use spkm\IsamsApi\Requests\Teaching\TeachingSets\RemoveStudentFromTeachingSetRequest;

class TeachingSetsResource extends BaseResource
{
    public function addStudentToTeachingSet(int $setId, string $schoolId): Response
    {
        return $this->connector->send(new AddStudentToTeachingSetRequest($setId, $schoolId));
    }

    public function getStudentsInSetBySetid(int $setId): Response
    {
        return $this->connector->send(new GetStudentsInSetBySetidRequest($setId));
    }

    public function getTeachingSets(): Response
    {
        return $this->connector->send(new GetTeachingSetsRequest());
    }

    public function removeStudentFromTeachingSet(int $setId, string $schoolId): Response
    {
        return $this->connector->send(new RemoveStudentFromTeachingSetRequest($setId, $schoolId));
    }
}
