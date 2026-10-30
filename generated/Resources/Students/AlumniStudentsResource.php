<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Students\AlumniStudents\GetAlumniStudentRequest;
use spkm\IsamsApi\Requests\Students\AlumniStudents\GetAlumniStudentsRequest;
use spkm\IsamsApi\Requests\Students\AlumniStudents\PatchAlumniStudentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class AlumniStudentsResource extends BaseResource
{
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetAlumniStudentsRequest($page, $pageSize, $filter));
    }

    public function get(string $schoolId): Response
    {
        return $this->connector->send(new GetAlumniStudentRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchAlumniStudentRequest($schoolId, $patch));
    }
}
