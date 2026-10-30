<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Students\Photos\CreateStudentPhotoRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentStudentPhotoRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetStudentPhotoRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PhotosResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Students\Photos\CreateStudentPhotoRequest
     */
    public function create(string $schoolId, MultipartValue $photo): Created
    {
        return $this->fetch(new CreateStudentPhotoRequest(schoolId: $schoolId, photo: $photo));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Photos\GetStudentPhotoRequest
     */
    public function get(string $schoolId, int $photoId): File
    {
        return $this->fetch(new GetStudentPhotoRequest(schoolId: $schoolId, photoId: $photoId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Photos\GetCurrentStudentPhotoRequest
     */
    public function getCurrent(string $schoolId): File
    {
        return $this->fetch(new GetCurrentStudentPhotoRequest(schoolId: $schoolId));
    }
}
