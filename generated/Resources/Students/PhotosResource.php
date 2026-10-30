<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\Photos\CreateStudentPhotoRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentPhotoBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetPhotosBySchoolidPhotoidRequest;

class PhotosResource extends BaseResource
{
    public function createStudentPhoto(string $schoolId, MultipartValue $photo): Response
    {
        return $this->connector->send(new CreateStudentPhotoRequest($schoolId, $photo));
    }

    public function getCurrentPhotoBySchoolid(string $schoolId): Response
    {
        return $this->connector->send(new GetCurrentPhotoBySchoolidRequest($schoolId));
    }

    public function getPhotosBySchoolidPhotoid(string $schoolId, int $photoId): Response
    {
        return $this->connector->send(new GetPhotosBySchoolidPhotoidRequest($schoolId, $photoId));
    }
}
