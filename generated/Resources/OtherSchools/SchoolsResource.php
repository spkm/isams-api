<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\OtherSchools;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate;
use spkm\IsamsApi\Requests\OtherSchools\Schools\CreateOtherSchoolRequest;
use spkm\IsamsApi\Requests\OtherSchools\Schools\GetOtherSchoolRequest;
use spkm\IsamsApi\Requests\OtherSchools\Schools\GetOtherSchoolsRequest;
use spkm\IsamsApi\Requests\OtherSchools\Schools\UpdateOtherSchoolRequest;

class SchoolsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate|array<string, mixed>  $school
     */
    public function createOtherSchool(OtherSchoolForCreate|array $school): Response
    {
        return $this->connector->send(new CreateOtherSchoolRequest($school));
    }

    public function getOtherSchool(int $id): Response
    {
        return $this->connector->send(new GetOtherSchoolRequest($id));
    }

    public function getOtherSchools(?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetOtherSchoolsRequest($page, $pageSize));
    }

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate|array<string, mixed>  $school
     */
    public function updateOtherSchool(int $id, OtherSchoolForUpdate|array $school): Response
    {
        return $this->connector->send(new UpdateOtherSchoolRequest($id, $school));
    }
}
