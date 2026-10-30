<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Resources\Students\ContactsResource;
use spkm\IsamsApi\Resources\Students\CustomFieldsResource;
use spkm\IsamsApi\Resources\Students\PhotosResource;
use spkm\IsamsApi\Resources\Students\SystemStatusesResource;

class StudentsResource extends BaseResource
{
    public function contacts(): ContactsResource
    {
        return new ContactsResource($this->connector);
    }

    public function customFields(): CustomFieldsResource
    {
        return new CustomFieldsResource($this->connector);
    }

    public function photos(): PhotosResource
    {
        return new PhotosResource($this->connector);
    }

    public function systemStatuses(): SystemStatusesResource
    {
        return new SystemStatusesResource($this->connector);
    }

    public function getStudent(string $schoolId, mixed $expand = null): Response
    {
        return $this->connector->send(new GetStudentRequest($schoolId, $expand));
    }

    public function getStudents(
        mixed $page = null,
        mixed $pageSize = null,
        mixed $expand = null,
        mixed $filter = null,
    ): Response {
        return $this->connector->send(new GetStudentsRequest($page, $pageSize, $expand, $filter));
    }
}
