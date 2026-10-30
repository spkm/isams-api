<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Students\Alumni\GetAlumniBySchoolIdRequest;
use spkm\IsamsApi\Requests\Students\Alumni\GetAlumniRequest;
use spkm\IsamsApi\Requests\Students\Alumni\MoveAlumniToApplicantRequest;
use spkm\IsamsApi\Requests\Students\Alumni\MoveAlumniToCurrentRequest;
use spkm\IsamsApi\Requests\Students\Alumni\PatchAlumniRequest;
use spkm\IsamsApi\Support\JsonPatch;

class AlumniResource extends BaseResource
{
    public function all(
        ?int $page = null,
        ?int $pageSize = null,
        ?string $expand = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetAlumniRequest($page, $pageSize, $expand, $filter));
    }

    public function get(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetAlumniBySchoolIdRequest($schoolId, $expand));
    }

    public function moveToApplicant(string $schoolId): Response
    {
        return $this->connector->send(new MoveAlumniToApplicantRequest($schoolId));
    }

    public function moveToCurrent(string $schoolId): Response
    {
        return $this->connector->send(new MoveAlumniToCurrentRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchAlumniRequest($schoolId, $patch));
    }
}
