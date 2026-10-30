<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\UniversityForCreate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\CreateUniversityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\GetUniversitiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\GetUniversityRequest;

class ListUniversitiesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\UniversityForCreate|array<string, mixed>  $university
     */
    public function createUniversity(UniversityForCreate|array $university): Response
    {
        return $this->connector->send(new CreateUniversityRequest($university));
    }

    public function getUniversities(): Response
    {
        return $this->connector->send(new GetUniversitiesRequest());
    }

    public function getUniversity(int $id): Response
    {
        return $this->connector->send(new GetUniversityRequest($id));
    }
}
