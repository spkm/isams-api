<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\Student;
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

class StudentsResource extends IsamsResource
{
    public function alumni(): AlumniResource
    {
        return new AlumniResource($this->connector);
    }

    public function alumniContacts(): AlumniContactsResource
    {
        return new AlumniContactsResource($this->connector);
    }

    public function alumniCustomFields(): AlumniCustomFieldsResource
    {
        return new AlumniCustomFieldsResource($this->connector);
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

    public function document(): DocumentResource
    {
        return new DocumentResource($this->connector);
    }

    public function documentCategory(): DocumentCategoryResource
    {
        return new DocumentCategoryResource($this->connector);
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
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Students\Student>
     * @see \spkm\IsamsApi\Requests\Students\GetStudentsRequest
     */
    public function all(mixed $expand = null, mixed $filter = null): LazyCollection
    {
        return $this->each(new GetStudentsRequest(expand: $expand, filter: $filter), Student::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentForCreate|array<string, mixed>  $student
     * @see \spkm\IsamsApi\Requests\Students\CreateStudentRequest
     */
    public function create(StudentForCreate|array $student): Created
    {
        return $this->fetch(new CreateStudentRequest(student: $student));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\GetStudentRequest
     */
    public function get(string $schoolId, mixed $expand = null): Student
    {
        return $this->fetch(new GetStudentRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\MoveStudentToAlumniRequest
     */
    public function moveToAlumni(string $schoolId): Created
    {
        return $this->fetch(new MoveStudentToAlumniRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\MoveStudentToApplicantRequest
     */
    public function moveToApplicant(string $schoolId): Created
    {
        return $this->fetch(new MoveStudentToApplicantRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Students\PatchStudentRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentRequest(schoolId: $schoolId, patch: $patch));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentForUpdate|array<string, mixed>  $student
     * @see \spkm\IsamsApi\Requests\Students\UpdateStudentRequest
     */
    public function update(string $schoolId, StudentForUpdate|array $student): void
    {
        $this->fetch(new UpdateStudentRequest(schoolId: $schoolId, student: $student));
    }
}
