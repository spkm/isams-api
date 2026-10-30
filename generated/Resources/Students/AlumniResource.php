<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\Alumni;
use spkm\IsamsApi\Requests\Students\Alumni\GetAlumniBySchoolIdRequest;
use spkm\IsamsApi\Requests\Students\Alumni\GetAlumniRequest;
use spkm\IsamsApi\Requests\Students\Alumni\MoveAlumniToApplicantRequest;
use spkm\IsamsApi\Requests\Students\Alumni\MoveAlumniToCurrentRequest;
use spkm\IsamsApi\Requests\Students\Alumni\PatchAlumniRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class AlumniResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Students\Alumni>
     * @see \spkm\IsamsApi\Requests\Students\Alumni\GetAlumniRequest
     */
    public function all(?string $expand = null, string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAlumniRequest(expand: $expand, filter: $filter), Alumni::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Alumni\GetAlumniBySchoolIdRequest
     */
    public function get(string $schoolId, ?string $expand = null): Alumni
    {
        return $this->fetch(new GetAlumniBySchoolIdRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Alumni\MoveAlumniToApplicantRequest
     */
    public function moveToApplicant(string $schoolId): Created
    {
        return $this->fetch(new MoveAlumniToApplicantRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Alumni\MoveAlumniToCurrentRequest
     */
    public function moveToCurrent(string $schoolId): Created
    {
        return $this->fetch(new MoveAlumniToCurrentRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Students\Alumni\PatchAlumniRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchAlumniRequest(schoolId: $schoolId, patch: $patch));

        return true;
    }
}
