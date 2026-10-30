<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate;
use spkm\IsamsApi\Requests\OtherSchools\CreateOtherSchoolRequest;
use spkm\IsamsApi\Requests\OtherSchools\GetOtherSchoolRequest;
use spkm\IsamsApi\Requests\OtherSchools\GetOtherSchoolsRequest;
use spkm\IsamsApi\Requests\OtherSchools\UpdateOtherSchoolRequest;
use spkm\IsamsApi\Resources\OtherSchools\ProfessionsResource;

class OtherSchoolsResource extends BaseResource
{
    public function professions(): ProfessionsResource
    {
        return new ProfessionsResource($this->connector);
    }

    public function all(?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetOtherSchoolsRequest($page, $pageSize));
    }

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate|array<string, mixed>  $otherSchool
     */
    public function create(OtherSchoolForCreate|array $otherSchool): Response
    {
        return $this->connector->send(new CreateOtherSchoolRequest($otherSchool));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetOtherSchoolRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate|array<string, mixed>  $otherSchool
     */
    public function update(int $id, OtherSchoolForUpdate|array $otherSchool): Response
    {
        return $this->connector->send(new UpdateOtherSchoolRequest($id, $otherSchool));
    }
}
