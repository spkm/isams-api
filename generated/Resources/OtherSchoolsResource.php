<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\OtherSchools\OtherSchool;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate;
use spkm\IsamsApi\Requests\OtherSchools\CreateOtherSchoolRequest;
use spkm\IsamsApi\Requests\OtherSchools\GetOtherSchoolRequest;
use spkm\IsamsApi\Requests\OtherSchools\GetOtherSchoolsRequest;
use spkm\IsamsApi\Requests\OtherSchools\UpdateOtherSchoolRequest;
use spkm\IsamsApi\Resources\OtherSchools\ProfessionsResource;

class OtherSchoolsResource extends IsamsResource
{
    public function professions(): ProfessionsResource
    {
        return new ProfessionsResource($this->connector);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\OtherSchools\OtherSchool>
     * @see \spkm\IsamsApi\Requests\OtherSchools\GetOtherSchoolsRequest
     */
    public function all(): LazyCollection
    {
        return $this->each(new GetOtherSchoolsRequest(), OtherSchool::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate|array<string, mixed>  $otherSchool
     * @see \spkm\IsamsApi\Requests\OtherSchools\CreateOtherSchoolRequest
     */
    public function create(OtherSchoolForCreate|array $otherSchool): Created
    {
        return $this->fetch(new CreateOtherSchoolRequest(otherSchool: $otherSchool));
    }

    /**
     * @see \spkm\IsamsApi\Requests\OtherSchools\GetOtherSchoolRequest
     */
    public function get(int $id): OtherSchool
    {
        return $this->fetch(new GetOtherSchoolRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate|array<string, mixed>  $otherSchool
     * @see \spkm\IsamsApi\Requests\OtherSchools\UpdateOtherSchoolRequest
     */
    public function update(int $id, OtherSchoolForUpdate|array $otherSchool): bool
    {
        $this->fetch(new UpdateOtherSchoolRequest(id: $id, otherSchool: $otherSchool));

        return true;
    }
}
