<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlag;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\CreateStudentFlagRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\DeleteStudentFlagRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\GetStudentFlagRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Flag\PatchStudentFlagRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class FlagResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate|array<string, mixed>  $pastoralFlag
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Flag\CreateStudentFlagRequest
     */
    public function create(string $schoolId, PastoralFlagForCreate|array $pastoralFlag): Created
    {
        return $this->fetch(new CreateStudentFlagRequest(schoolId: $schoolId, pastoralFlag: $pastoralFlag));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Flag\DeleteStudentFlagRequest
     */
    public function delete(string $schoolId): void
    {
        $this->fetch(new DeleteStudentFlagRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Flag\GetStudentFlagRequest
     */
    public function get(string $schoolId): PastoralFlag
    {
        return $this->fetch(new GetStudentFlagRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Flag\PatchStudentFlagRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentFlagRequest(schoolId: $schoolId, patch: $patch));
    }
}
