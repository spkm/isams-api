<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\Alumni;
use spkm\IsamsApi\Requests\Admissions\Alumni\GetApplicantAlumniRequest;
use spkm\IsamsApi\Requests\Admissions\Alumni\GetApplicantAlumnusRequest;
use spkm\IsamsApi\Requests\Admissions\Alumni\PatchApplicantAlumnusRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class AlumniResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Admissions\Alumni>
     * @see \spkm\IsamsApi\Requests\Admissions\Alumni\GetApplicantAlumniRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetApplicantAlumniRequest(filter: $filter), Alumni::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Alumni\GetApplicantAlumnusRequest
     */
    public function get(string $schoolId): Alumni
    {
        return $this->fetch(new GetApplicantAlumnusRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Admissions\Alumni\PatchApplicantAlumnusRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchApplicantAlumnusRequest(schoolId: $schoolId, patch: $patch));

        return true;
    }
}
