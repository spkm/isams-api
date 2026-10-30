<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\School\ConfigurationResource;
use spkm\IsamsApi\Resources\School\DepartmentEmployeesResource;
use spkm\IsamsApi\Resources\School\DepartmentsResource;
use spkm\IsamsApi\Resources\School\DivisionsResource;
use spkm\IsamsApi\Resources\School\FormsResource;
use spkm\IsamsApi\Resources\School\HousesResource;
use spkm\IsamsApi\Resources\School\TeachingDepartmentSubjectsResource;
use spkm\IsamsApi\Resources\School\TermsResource;
use spkm\IsamsApi\Resources\School\YearGroupDivisionsResource;
use spkm\IsamsApi\Resources\School\YearGroupsResource;

class SchoolResource extends BaseResource
{
    public function configuration(): ConfigurationResource
    {
        return new ConfigurationResource($this->connector);
    }

    public function departmentEmployees(): DepartmentEmployeesResource
    {
        return new DepartmentEmployeesResource($this->connector);
    }

    public function departments(): DepartmentsResource
    {
        return new DepartmentsResource($this->connector);
    }

    public function divisions(): DivisionsResource
    {
        return new DivisionsResource($this->connector);
    }

    public function forms(): FormsResource
    {
        return new FormsResource($this->connector);
    }

    public function houses(): HousesResource
    {
        return new HousesResource($this->connector);
    }

    public function teachingDepartmentSubjects(): TeachingDepartmentSubjectsResource
    {
        return new TeachingDepartmentSubjectsResource($this->connector);
    }

    public function terms(): TermsResource
    {
        return new TermsResource($this->connector);
    }

    public function yearGroupDivisions(): YearGroupDivisionsResource
    {
        return new YearGroupDivisionsResource($this->connector);
    }

    public function yearGroups(): YearGroupsResource
    {
        return new YearGroupsResource($this->connector);
    }
}
