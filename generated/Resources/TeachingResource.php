<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Teaching\CurriculumSubjectCodesResource;
use spkm\IsamsApi\Resources\Teaching\SubjectTeachingDepartmentsResource;
use spkm\IsamsApi\Resources\Teaching\SubjectsResource;
use spkm\IsamsApi\Resources\Teaching\TeachingSetsResource;

class TeachingResource extends BaseResource
{
    public function curriculumSubjectCodes(): CurriculumSubjectCodesResource
    {
        return new CurriculumSubjectCodesResource($this->connector);
    }

    public function subjectTeachingDepartments(): SubjectTeachingDepartmentsResource
    {
        return new SubjectTeachingDepartmentsResource($this->connector);
    }

    public function subjects(): SubjectsResource
    {
        return new SubjectsResource($this->connector);
    }

    public function teachingSets(): TeachingSetsResource
    {
        return new TeachingSetsResource($this->connector);
    }
}
