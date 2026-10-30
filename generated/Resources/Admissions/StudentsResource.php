<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Admissions\Students\GetApplicantStudentRequest;
use spkm\IsamsApi\Requests\Admissions\Students\GetApplicantStudentsRequest;
use spkm\IsamsApi\Requests\Admissions\Students\PatchApplicantStudentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentsResource extends BaseResource
{
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetApplicantStudentsRequest($page, $pageSize, $filter));
    }

    public function get(string $schoolId): Response
    {
        return $this->connector->send(new GetApplicantStudentRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchApplicantStudentRequest($schoolId, $patch));
    }
}
