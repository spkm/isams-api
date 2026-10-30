<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\Teaching\CurriculumSubjectCodesResource;
use spkm\IsamsApi\Resources\Teaching\SetsResource;
use spkm\IsamsApi\Resources\Teaching\SubjectTeachingDepartmentsResource;
use spkm\IsamsApi\Resources\Teaching\SubjectsResource;

class TeachingResource extends IsamsResource
{
    public function curriculumSubjectCodes(): CurriculumSubjectCodesResource
    {
        return new CurriculumSubjectCodesResource($this->connector);
    }

    public function sets(): SetsResource
    {
        return new SetsResource($this->connector);
    }

    public function subjectTeachingDepartments(): SubjectTeachingDepartmentsResource
    {
        return new SubjectTeachingDepartmentsResource($this->connector);
    }

    public function subjects(): SubjectsResource
    {
        return new SubjectsResource($this->connector);
    }
}
