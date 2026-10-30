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
    public function create(string $schoolId, MultipartValue $photo): Response
    {
        return $this->connector->send(new CreateStudentPhotoRequest($schoolId, $photo));
    }

    public function get(string $schoolId, int $photoId): Response
    {
        return $this->connector->send(new GetStudentPhotoRequest($schoolId, $photoId));
    }

    public function getCurrent(string $schoolId): Response
    {
        return $this->connector->send(new GetCurrentStudentPhotoRequest($schoolId));
    }
}
