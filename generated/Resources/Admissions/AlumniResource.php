<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Admissions\Alumni\GetApplicantAlumniRequest;
use spkm\IsamsApi\Requests\Admissions\Alumni\GetApplicantAlumnusRequest;
use spkm\IsamsApi\Requests\Admissions\Alumni\PatchApplicantAlumnusRequest;
use spkm\IsamsApi\Support\JsonPatch;

class AlumniResource extends BaseResource
{
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetApplicantAlumniRequest($page, $pageSize, $filter));
    }

    public function get(string $schoolId): Response
    {
        return $this->connector->send(new GetApplicantAlumnusRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchApplicantAlumnusRequest($schoolId, $patch));
    }
}
