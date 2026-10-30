<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\University;
use spkm\IsamsApi\Data\SystemConfiguration\UniversityForCreate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\CreateUniversityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\GetUniversitiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\GetUniversityRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class UniversitiesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\University>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\GetUniversitiesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetUniversitiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\UniversityForCreate|array<string, mixed>  $university
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\CreateUniversityRequest
     */
    public function create(UniversityForCreate|array $university): Created
    {
        return $this->fetch(new CreateUniversityRequest(university: $university));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Universities\GetUniversityRequest
     */
    public function get(int $id): University
    {
        return $this->fetch(new GetUniversityRequest(id: $id));
    }
}
