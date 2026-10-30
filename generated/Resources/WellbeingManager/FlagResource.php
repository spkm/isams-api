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
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate|array<string, mixed>  $pastoralFlag
     */
    public function create(string $schoolId, PastoralFlagForCreate|array $pastoralFlag): Response
    {
        return $this->connector->send(new CreateStudentFlagRequest($schoolId, $pastoralFlag));
    }

    public function delete(string $schoolId): Response
    {
        return $this->connector->send(new DeleteStudentFlagRequest($schoolId));
    }

    public function get(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentFlagRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentFlagRequest($schoolId, $patch));
    }
}
