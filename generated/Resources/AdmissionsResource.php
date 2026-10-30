<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Admissions\ApplicantForCreate;
use spkm\IsamsApi\Data\Admissions\ApplicantForUpdate;
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

class AdmissionsResource extends BaseResource
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

    public function all(
        ?int $page = null,
        ?int $pageSize = null,
        ?string $expand = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetApplicantsRequest($page, $pageSize, $expand, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantForCreate|array<string, mixed>  $applicant
     */
    public function create(ApplicantForCreate|array $applicant): Response
    {
        return $this->connector->send(new CreateApplicantRequest($applicant));
    }

    public function get(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantRequest($schoolId, $expand));
    }

    public function moveToCurrent(string $schoolId): Response
    {
        return $this->connector->send(new MoveApplicantToCurrentRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchApplicantRequest($schoolId, $patch));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantForUpdate|array<string, mixed>  $applicant
     */
    public function update(string $schoolId, ApplicantForUpdate|array $applicant): Response
    {
        return $this->connector->send(new UpdateApplicantRequest($schoolId, $applicant));
    }
}
