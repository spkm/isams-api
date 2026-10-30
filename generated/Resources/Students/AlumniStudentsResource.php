<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Students\AlumniStudent;
use spkm\IsamsApi\Requests\Students\AlumniStudents\GetAlumniStudentRequest;
use spkm\IsamsApi\Requests\Students\AlumniStudents\GetAlumniStudentsRequest;
use spkm\IsamsApi\Requests\Students\AlumniStudents\PatchAlumniStudentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class AlumniStudentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Students\AlumniStudent>
     * @see \spkm\IsamsApi\Requests\Students\AlumniStudents\GetAlumniStudentsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAlumniStudentsRequest(filter: $filter), AlumniStudent::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\AlumniStudents\GetAlumniStudentRequest
     */
    public function get(string $schoolId): AlumniStudent
    {
        return $this->fetch(new GetAlumniStudentRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Students\AlumniStudents\PatchAlumniStudentRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchAlumniStudentRequest(schoolId: $schoolId, patch: $patch));

        return true;
    }
}
