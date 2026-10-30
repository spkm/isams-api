<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\Student;
use spkm\IsamsApi\Requests\Admissions\Students\GetApplicantStudentRequest;
use spkm\IsamsApi\Requests\Admissions\Students\GetApplicantStudentsRequest;
use spkm\IsamsApi\Requests\Admissions\Students\PatchApplicantStudentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Admissions\Student>
     * @see \spkm\IsamsApi\Requests\Admissions\Students\GetApplicantStudentsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetApplicantStudentsRequest(filter: $filter), Student::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Students\GetApplicantStudentRequest
     */
    public function get(string $schoolId): Student
    {
        return $this->fetch(new GetApplicantStudentRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Admissions\Students\PatchApplicantStudentRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchApplicantStudentRequest(schoolId: $schoolId, patch: $patch));

        return true;
    }
}
