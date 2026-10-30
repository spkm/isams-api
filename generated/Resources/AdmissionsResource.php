<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\Applicant;
use spkm\IsamsApi\Data\Admissions\ApplicantForCreate;
use spkm\IsamsApi\Data\Admissions\ApplicantForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\CreateApplicantRequest;
use spkm\IsamsApi\Requests\Admissions\GetApplicantRequest;
use spkm\IsamsApi\Requests\Admissions\GetApplicantsRequest;
use spkm\IsamsApi\Requests\Admissions\MoveApplicantToCurrentRequest;
use spkm\IsamsApi\Requests\Admissions\PatchApplicantRequest;
use spkm\IsamsApi\Requests\Admissions\UpdateApplicantRequest;
use spkm\IsamsApi\Resources\Admissions\AgencyBranchesResource;
use spkm\IsamsApi\Resources\Admissions\AlumniCustomFieldsResource;
use spkm\IsamsApi\Resources\Admissions\AlumniResource;
use spkm\IsamsApi\Resources\Admissions\ContactsResource;
use spkm\IsamsApi\Resources\Admissions\CustomFieldsResource;
use spkm\IsamsApi\Resources\Admissions\DocumentCategoryResource;
use spkm\IsamsApi\Resources\Admissions\DocumentResource;
use spkm\IsamsApi\Resources\Admissions\EnquiryReasonsResource;
use spkm\IsamsApi\Resources\Admissions\EnquiryTypesResource;
use spkm\IsamsApi\Resources\Admissions\PassportCustomFieldsResource;
use spkm\IsamsApi\Resources\Admissions\PassportDocumentsResource;
use spkm\IsamsApi\Resources\Admissions\PassportsResource;
use spkm\IsamsApi\Resources\Admissions\StatusesResource;
use spkm\IsamsApi\Resources\Admissions\StudentCustomFieldsResource;
use spkm\IsamsApi\Resources\Admissions\StudentsResource;
use spkm\IsamsApi\Resources\Admissions\VisaCustomFieldsResource;
use spkm\IsamsApi\Resources\Admissions\VisaDocumentsResource;
use spkm\IsamsApi\Resources\Admissions\VisasResource;
use spkm\IsamsApi\Resources\Admissions\VisitsResource;
use spkm\IsamsApi\Support\JsonPatch;

class AdmissionsResource extends IsamsResource
{
    public function agencyBranches(): AgencyBranchesResource
    {
        return new AgencyBranchesResource($this->connector);
    }

    public function alumni(): AlumniResource
    {
        return new AlumniResource($this->connector);
    }

    public function alumniCustomFields(): AlumniCustomFieldsResource
    {
        return new AlumniCustomFieldsResource($this->connector);
    }

    public function contacts(): ContactsResource
    {
        return new ContactsResource($this->connector);
    }

    public function customFields(): CustomFieldsResource
    {
        return new CustomFieldsResource($this->connector);
    }

    public function document(): DocumentResource
    {
        return new DocumentResource($this->connector);
    }

    public function documentCategory(): DocumentCategoryResource
    {
        return new DocumentCategoryResource($this->connector);
    }

    public function enquiryReasons(): EnquiryReasonsResource
    {
        return new EnquiryReasonsResource($this->connector);
    }

    public function enquiryTypes(): EnquiryTypesResource
    {
        return new EnquiryTypesResource($this->connector);
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

    public function statuses(): StatusesResource
    {
        return new StatusesResource($this->connector);
    }

    public function studentCustomFields(): StudentCustomFieldsResource
    {
        return new StudentCustomFieldsResource($this->connector);
    }

    public function students(): StudentsResource
    {
        return new StudentsResource($this->connector);
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

    public function visits(): VisitsResource
    {
        return new VisitsResource($this->connector);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Admissions\Applicant>
     * @see \spkm\IsamsApi\Requests\Admissions\GetApplicantsRequest
     */
    public function all(?string $expand = null, string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetApplicantsRequest(expand: $expand, filter: $filter), Applicant::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantForCreate|array<string, mixed>  $applicant
     * @see \spkm\IsamsApi\Requests\Admissions\CreateApplicantRequest
     */
    public function create(ApplicantForCreate|array $applicant): Created
    {
        return $this->fetch(new CreateApplicantRequest(applicant: $applicant));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\GetApplicantRequest
     */
    public function get(string $schoolId, ?string $expand = null): Applicant
    {
        return $this->fetch(new GetApplicantRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\MoveApplicantToCurrentRequest
     */
    public function moveToCurrent(string $schoolId): Created
    {
        return $this->fetch(new MoveApplicantToCurrentRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Admissions\PatchApplicantRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchApplicantRequest(schoolId: $schoolId, patch: $patch));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantForUpdate|array<string, mixed>  $applicant
     * @see \spkm\IsamsApi\Requests\Admissions\UpdateApplicantRequest
     */
    public function update(string $schoolId, ApplicantForUpdate|array $applicant): bool
    {
        $this->fetch(new UpdateApplicantRequest(schoolId: $schoolId, applicant: $applicant));

        return true;
    }
}
