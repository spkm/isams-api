<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate;
use spkm\IsamsApi\Data\Admissions\SubmissionOwner;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormDefaultApplicationFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormDefaultEnquiryFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormDefaultRegistrationFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormLegacyConfigurationRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormSubmissionsByUserCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetApplicationFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetApplicationSummaryRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetEnquiryFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetFormSubmissionByGlobalReferenceIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetFormSubmissionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetOriginalFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetRegistrationFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetRegistrationSummariesRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetRegistrationSummaryRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\SaveAdmissionsFormSubmittedFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\UpdateAdmissionsFormSubmissionOwnerRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FormsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetApplicationFormRequest
     */
    public function getApplicationForm(int $code): mixed
    {
        return $this->fetch(new GetApplicationFormRequest(code: $code));
    }

    /**
     * @param  array<mixed>  $codes
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetApplicationSummaryRequest
     */
    public function getApplicationSummary(array $codes): mixed
    {
        return $this->fetch(new GetApplicationSummaryRequest(codes: $codes));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormDefaultApplicationFormRequest
     */
    public function getDefaultApplicationForm(): mixed
    {
        return $this->fetch(new GetAdmissionsFormDefaultApplicationFormRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormDefaultEnquiryFormRequest
     */
    public function getDefaultEnquiryForm(): mixed
    {
        return $this->fetch(new GetAdmissionsFormDefaultEnquiryFormRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormDefaultRegistrationFormRequest
     */
    public function getDefaultRegistrationForm(): mixed
    {
        return $this->fetch(new GetAdmissionsFormDefaultRegistrationFormRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetEnquiryFormRequest
     */
    public function getEnquiryForm(int $code): mixed
    {
        return $this->fetch(new GetEnquiryFormRequest(code: $code));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormLegacyConfigurationRequest
     */
    public function getLegacyConfiguration(): mixed
    {
        return $this->fetch(new GetAdmissionsFormLegacyConfigurationRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetOriginalFormRequest
     */
    public function getOriginalForm(int $code): mixed
    {
        return $this->fetch(new GetOriginalFormRequest(code: $code));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetRegistrationFormRequest
     */
    public function getRegistrationForm(int $code): mixed
    {
        return $this->fetch(new GetRegistrationFormRequest(code: $code));
    }

    /**
     * @param  array<mixed>  $codes
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetRegistrationSummariesRequest
     */
    public function getRegistrationSummaries(array $codes): mixed
    {
        return $this->fetch(new GetRegistrationSummariesRequest(codes: $codes));
    }

    /**
     * @param  array<mixed>  $codes
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetRegistrationSummaryRequest
     */
    public function getRegistrationSummary(array $codes): mixed
    {
        return $this->fetch(new GetRegistrationSummaryRequest(codes: $codes));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetFormSubmissionRequest
     */
    public function getSubmission(int $id): mixed
    {
        return $this->fetch(new GetFormSubmissionRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetFormSubmissionByGlobalReferenceIdRequest
     */
    public function getSubmissionByGlobalReferenceId(string $formSubmissionGlobalId): mixed
    {
        return $this->fetch(new GetFormSubmissionByGlobalReferenceIdRequest(formSubmissionGlobalId: $formSubmissionGlobalId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\GetAdmissionsFormSubmissionsByUserCodeRequest
     */
    public function getSubmissionsByUserCode(?string $type = null, ?string $tempGuestUser = null): mixed
    {
        return $this->fetch(new GetAdmissionsFormSubmissionsByUserCodeRequest(type: $type, tempGuestUser: $tempGuestUser));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate|array<string, mixed>  $admissionsFormOrchardForm
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\SaveAdmissionsFormSubmittedFormRequest
     */
    public function saveSubmittedForm(AdmissionsFormOrchardFormForCreate|array $admissionsFormOrchardForm): Created
    {
        return $this->fetch(new SaveAdmissionsFormSubmittedFormRequest(admissionsFormOrchardForm: $admissionsFormOrchardForm));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\SubmissionOwner|array<string, mixed>  $submissionOwner
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms\UpdateAdmissionsFormSubmissionOwnerRequest
     */
    public function updateSubmissionOwner(SubmissionOwner|array $submissionOwner): Created
    {
        return $this->fetch(new UpdateAdmissionsFormSubmissionOwnerRequest(submissionOwner: $submissionOwner));
    }
}
