<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate;
use spkm\IsamsApi\Data\Admissions\SubmissionOwner;
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

class FormsResource extends BaseResource
{
    public function getApplicationForm(int $code): Response
    {
        return $this->connector->send(new GetApplicationFormRequest($code));
    }

    /**
     * @param  array<mixed>  $codes
     */
    public function getApplicationSummary(array $codes): Response
    {
        return $this->connector->send(new GetApplicationSummaryRequest($codes));
    }

    public function getDefaultApplicationForm(): Response
    {
        return $this->connector->send(new GetAdmissionsFormDefaultApplicationFormRequest());
    }

    public function getDefaultEnquiryForm(): Response
    {
        return $this->connector->send(new GetAdmissionsFormDefaultEnquiryFormRequest());
    }

    public function getDefaultRegistrationForm(): Response
    {
        return $this->connector->send(new GetAdmissionsFormDefaultRegistrationFormRequest());
    }

    public function getEnquiryForm(int $code): Response
    {
        return $this->connector->send(new GetEnquiryFormRequest($code));
    }

    public function getLegacyConfiguration(): Response
    {
        return $this->connector->send(new GetAdmissionsFormLegacyConfigurationRequest());
    }

    public function getOriginalForm(int $code): Response
    {
        return $this->connector->send(new GetOriginalFormRequest($code));
    }

    public function getRegistrationForm(int $code): Response
    {
        return $this->connector->send(new GetRegistrationFormRequest($code));
    }

    /**
     * @param  array<mixed>  $codes
     */
    public function getRegistrationSummaries(array $codes): Response
    {
        return $this->connector->send(new GetRegistrationSummariesRequest($codes));
    }

    /**
     * @param  array<mixed>  $codes
     */
    public function getRegistrationSummary(array $codes): Response
    {
        return $this->connector->send(new GetRegistrationSummaryRequest($codes));
    }

    public function getSubmission(int $id): Response
    {
        return $this->connector->send(new GetFormSubmissionRequest($id));
    }

    public function getSubmissionByGlobalReferenceId(string $formSubmissionGlobalId): Response
    {
        return $this->connector->send(new GetFormSubmissionByGlobalReferenceIdRequest($formSubmissionGlobalId));
    }

    public function getSubmissionsByUserCode(?string $type = null, ?string $tempGuestUser = null): Response
    {
        return $this->connector->send(new GetAdmissionsFormSubmissionsByUserCodeRequest($type, $tempGuestUser));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate|array<string, mixed>  $admissionsFormOrchardForm
     */
    public function saveSubmittedForm(AdmissionsFormOrchardFormForCreate|array $admissionsFormOrchardForm): Response
    {
        return $this->connector->send(new SaveAdmissionsFormSubmittedFormRequest($admissionsFormOrchardForm));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\SubmissionOwner|array<string, mixed>  $submissionOwner
     */
    public function updateSubmissionOwner(SubmissionOwner|array $submissionOwner): Response
    {
        return $this->connector->send(new UpdateAdmissionsFormSubmissionOwnerRequest($submissionOwner));
    }
}
