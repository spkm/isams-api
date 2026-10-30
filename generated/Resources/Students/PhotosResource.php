<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\Photos\CreateStudentPhotoRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentStudentPhotoRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetStudentPhotoRequest;

class PhotosResource extends BaseResource
{
    public function createStudentPhoto(string $schoolId, MultipartValue $photo): Response
    {
        return $this->connector->send(new CreateStudentPhotoRequest($schoolId, $photo));
    }

    public function getCurrentStudentPhoto(string $schoolId): Response
    {
        return $this->connector->send(new GetCurrentStudentPhotoRequest($schoolId));
    }

    public function getStudentPhoto(string $schoolId, int $photoId): Response
    {
        return $this->connector->send(new GetStudentPhotoRequest($schoolId, $photoId));
    }
}
