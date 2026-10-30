<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\CreateStudentFlagRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\DeleteStudentFlagRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\GetStudentFlagRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\PatchStudentFlagRequest;
use spkm\IsamsApi\Support\JsonPatch;

class FlagResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate|array<string, mixed>  $flag
     */
    public function createStudentFlag(string $schoolId, PastoralFlagForCreate|array $flag): Response
    {
        return $this->connector->send(new CreateStudentFlagRequest($schoolId, $flag));
    }

    public function deleteStudentFlag(string $schoolId): Response
    {
        return $this->connector->send(new DeleteStudentFlagRequest($schoolId));
    }

    public function getStudentFlag(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentFlagRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentFlag(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentFlagRequest($schoolId, $patch));
    }
}
