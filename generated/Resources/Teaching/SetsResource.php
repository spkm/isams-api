<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Teaching\Sets\AddStudentToTeachingSetRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\GetTeachingSetStudentsRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\GetTeachingSetsRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\RemoveStudentFromTeachingSetRequest;

class SetsResource extends BaseResource
{
    public function addStudent(int $setId, string $schoolId): Response
    {
        return $this->connector->send(new AddStudentToTeachingSetRequest($setId, $schoolId));
    }

    public function all(): Response
    {
        return $this->connector->send(new GetTeachingSetsRequest());
    }

    public function getStudents(int $setId): Response
    {
        return $this->connector->send(new GetTeachingSetStudentsRequest($setId));
    }

    public function removeStudent(int $setId, string $schoolId): Response
    {
        return $this->connector->send(new RemoveStudentFromTeachingSetRequest($setId, $schoolId));
    }
}
