<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\CreateEmployeePhotoRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetCurrentEmployeePhotoRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetEmployeePhotoRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeePhotosResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\CreateEmployeePhotoRequest
     */
    public function create(int $employeeId, MultipartValue $photo): Created
    {
        return $this->fetch(new CreateEmployeePhotoRequest(employeeId: $employeeId, photo: $photo));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetEmployeePhotoRequest
     */
    public function get(int $employeeId, int $photoId): File
    {
        return $this->fetch(new GetEmployeePhotoRequest(employeeId: $employeeId, photoId: $photoId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetCurrentEmployeePhotoRequest
     */
    public function getCurrent(int $employeeId): File
    {
        return $this->fetch(new GetCurrentEmployeePhotoRequest(employeeId: $employeeId));
    }
}
