<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\School\Departments\GetDepartmentRequest;
use spkm\IsamsApi\Requests\School\Departments\GetDepartmentsRequest;

class DepartmentsResource extends BaseResource
{
    public function all(string $departmentType, ?string $expand = null): Response
    {
        return $this->connector->send(new GetDepartmentsRequest($departmentType, $expand));
    }

    public function get(string $departmentType, int $id): Response
    {
        return $this->connector->send(new GetDepartmentRequest($departmentType, $id));
    }
}
