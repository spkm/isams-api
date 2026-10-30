<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentForCreate;
use spkm\IsamsApi\Data\Students\StudentForUpdate;
use spkm\IsamsApi\Requests\Students\CreateStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Students\MoveStudentToAlumniRequest;
use spkm\IsamsApi\Requests\Students\MoveStudentToApplicantRequest;
use spkm\IsamsApi\Requests\Students\PatchStudentRequest;
use spkm\IsamsApi\Requests\Students\UpdateStudentRequest;
use spkm\IsamsApi\Resources\Students\AlumniContactsResource;
use spkm\IsamsApi\Resources\Students\AlumniCustomFieldsResource;
use spkm\IsamsApi\Resources\Students\AlumniResource;
use spkm\IsamsApi\Resources\Students\AlumniStudentsResource;
use spkm\IsamsApi\Resources\Students\ApplicantCustomFieldsResource;
use spkm\IsamsApi\Resources\Students\BoardingStatusesResource;
use spkm\IsamsApi\Resources\Students\CommunicationHistoryResource;
use spkm\IsamsApi\Resources\Students\ContactGroupContactsResource;
use spkm\IsamsApi\Resources\Students\ContactGroupsResource;
use spkm\IsamsApi\Resources\Students\ContactsResource;
use spkm\IsamsApi\Resources\Students\CustomFieldsResource;
use spkm\IsamsApi\Resources\Students\CustomStudentGroupStudentsResource;
use spkm\IsamsApi\Resources\Students\CustomStudentGroupsResource;
use spkm\IsamsApi\Resources\Students\DocumentCategoryResource;
use spkm\IsamsApi\Resources\Students\DocumentResource;
use spkm\IsamsApi\Resources\Students\PassportCustomFieldsResource;
use spkm\IsamsApi\Resources\Students\PassportDocumentsResource;
use spkm\IsamsApi\Resources\Students\PassportsResource;
use spkm\IsamsApi\Resources\Students\PhotosResource;
use spkm\IsamsApi\Resources\Students\SystemStatusesResource;
use spkm\IsamsApi\Resources\Students\VisaCustomFieldsResource;
use spkm\IsamsApi\Resources\Students\VisaDocumentsResource;
use spkm\IsamsApi\Resources\Students\VisasResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentsResource extends BaseResource
{
    public function alumniContacts(): AlumniContactsResource
    {
        return new AlumniContactsResource($this->connector);
    }

    public function alumniCustomFields(): AlumniCustomFieldsResource
    {
        return new AlumniCustomFieldsResource($this->connector);
    }

    public function alumni(): AlumniResource
    {
        return new AlumniResource($this->connector);
    }

    public function alumniStudents(): AlumniStudentsResource
    {
        return new AlumniStudentsResource($this->connector);
    }

    public function applicantCustomFields(): ApplicantCustomFieldsResource
    {
        return new ApplicantCustomFieldsResource($this->connector);
    }

    public function boardingStatuses(): BoardingStatusesResource
    {
        return new BoardingStatusesResource($this->connector);
    }

    public function communicationHistory(): CommunicationHistoryResource
    {
        return new CommunicationHistoryResource($this->connector);
    }

    public function contactGroupContacts(): ContactGroupContactsResource
    {
        return new ContactGroupContactsResource($this->connector);
    }

    public function contactGroups(): ContactGroupsResource
    {
        return new ContactGroupsResource($this->connector);
    }

    public function contacts(): ContactsResource
    {
        return new ContactsResource($this->connector);
    }

    public function customFields(): CustomFieldsResource
    {
        return new CustomFieldsResource($this->connector);
    }

    public function customStudentGroupStudents(): CustomStudentGroupStudentsResource
    {
        return new CustomStudentGroupStudentsResource($this->connector);
    }

    public function customStudentGroups(): CustomStudentGroupsResource
    {
        return new CustomStudentGroupsResource($this->connector);
    }

    public function documentCategory(): DocumentCategoryResource
    {
        return new DocumentCategoryResource($this->connector);
    }

    public function document(): DocumentResource
    {
        return new DocumentResource($this->connector);
    }

    public function passportCustomFields(): PassportCustomFieldsResource
    {
        return new PassportCustomFieldsResource($this->connector);
    }

    public function passportDocuments(): PassportDocumentsResource
    {
        return new PassportDocumentsResource($this->connector);
    }

    public function passports(): PassportsResource
    {
        return new PassportsResource($this->connector);
    }

    public function photos(): PhotosResource
    {
        return new PhotosResource($this->connector);
    }

    public function systemStatuses(): SystemStatusesResource
    {
        return new SystemStatusesResource($this->connector);
    }

    public function visaCustomFields(): VisaCustomFieldsResource
    {
        return new VisaCustomFieldsResource($this->connector);
    }

    public function visaDocuments(): VisaDocumentsResource
    {
        return new VisaDocumentsResource($this->connector);
    }

    public function visas(): VisasResource
    {
        return new VisasResource($this->connector);
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentForCreate|array<string, mixed>  $student
     */
    public function createStudent(StudentForCreate|array $student): Response
    {
        return $this->connector->send(new CreateStudentRequest($student));
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

    public function moveStudentToAlumni(string $schoolId): Response
    {
        return $this->connector->send(new MoveStudentToAlumniRequest($schoolId));
    }

    public function moveStudentToApplicant(string $schoolId): Response
    {
        return $this->connector->send(new MoveStudentToApplicantRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudent(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentRequest($schoolId, $patch));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentForUpdate|array<string, mixed>  $student
     */
    public function updateStudent(string $schoolId, StudentForUpdate|array $student): Response
    {
        return $this->connector->send(new UpdateStudentRequest($schoolId, $student));
    }
}
