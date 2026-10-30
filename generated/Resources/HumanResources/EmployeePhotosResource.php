<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\CreateEmployeePhotoRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetCurrentEmployeePhotoRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeePhotos\GetEmployeePhotoRequest;

class EmployeePhotosResource extends BaseResource
{
    public function create(int $employeeId, MultipartValue $photo): Response
    {
        return $this->connector->send(new CreateEmployeePhotoRequest($employeeId, $photo));
    }

    public function get(int $employeeId, int $photoId): Response
    {
        return $this->connector->send(new GetEmployeePhotoRequest($employeeId, $photoId));
    }

    public function getCurrent(int $employeeId): Response
    {
        return $this->connector->send(new GetCurrentEmployeePhotoRequest($employeeId));
    }
}
