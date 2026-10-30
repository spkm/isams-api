<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\CreateStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\DeleteStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\GetStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\PatchStudentConcernRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentConcernsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernForCreate|array<string, mixed>  $concern
     */
    public function create(string $schoolId, ConcernForCreate|array $concern): Response
    {
        return $this->connector->send(new CreateStudentConcernRequest($schoolId, $concern));
    }

    public function delete(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteStudentConcernRequest($schoolId, $id));
    }

    public function get(string $schoolId, int $id): Response
    {
        return $this->connector->send(new GetStudentConcernRequest($schoolId, $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentConcernRequest($schoolId, $id, $patch));
    }
}
