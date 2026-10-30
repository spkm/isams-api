<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate;
use spkm\IsamsApi\Data\Admissions\SubmissionOwner;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormApplicationFormByCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormApplicationSummaryFormByCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormDefaultApplicationFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormDefaultEnquiryFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormDefaultRegistrationFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormEnquiryFormFromCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormLegacyConfigurationRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormOriginalFormByCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormRegistrationFormByCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormRegistrationSummariesFormByCodesRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormRegistrationSummaryFormByCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormSubmissionByGlobalReferenceIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormSubmissionByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\GetPortalsAdmissionsFormSubmissionsByUserCodeRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\SavePortalsAdmissionsFormSubmittedFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms\UpdatePortalsAdmissionsFormSubmissionOwnerRequest;

class AdmissionsPortalsAdmissionsFormsResource extends BaseResource
{
    public function getPortalsAdmissionsFormApplicationFormByCode(int $code): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormApplicationFormByCodeRequest($code));
    }

    /**
     * @param  array<mixed>  $codes
     */
    public function getPortalsAdmissionsFormApplicationSummaryFormByCode(array $codes): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormApplicationSummaryFormByCodeRequest($codes));
    }

    public function getPortalsAdmissionsFormDefaultApplicationForm(): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormDefaultApplicationFormRequest());
    }

    public function getPortalsAdmissionsFormDefaultEnquiryForm(): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormDefaultEnquiryFormRequest());
    }

    public function getPortalsAdmissionsFormDefaultRegistrationForm(): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormDefaultRegistrationFormRequest());
    }

    public function getPortalsAdmissionsFormEnquiryFormFromCode(int $code): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormEnquiryFormFromCodeRequest($code));
    }

    public function getPortalsAdmissionsFormLegacyConfiguration(): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormLegacyConfigurationRequest());
    }

    public function getPortalsAdmissionsFormOriginalFormByCode(int $code): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormOriginalFormByCodeRequest($code));
    }

    public function getPortalsAdmissionsFormRegistrationFormByCode(int $code): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormRegistrationFormByCodeRequest($code));
    }

    /**
     * @param  array<mixed>  $codes
     */
    public function getPortalsAdmissionsFormRegistrationSummariesFormByCodes(array $codes): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormRegistrationSummariesFormByCodesRequest($codes));
    }

    /**
     * @param  array<mixed>  $codes
     */
    public function getPortalsAdmissionsFormRegistrationSummaryFormByCode(array $codes): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormRegistrationSummaryFormByCodeRequest($codes));
    }

    public function getPortalsAdmissionsFormSubmissionByGlobalReferenceId(string $formSubmissionGlobalId): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormSubmissionByGlobalReferenceIdRequest($formSubmissionGlobalId));
    }

    public function getPortalsAdmissionsFormSubmissionById(int $id): Response
    {
        return $this->connector->send(new GetPortalsAdmissionsFormSubmissionByIdRequest($id));
    }

    public function getPortalsAdmissionsFormSubmissionsByUserCode(
        ?string $type = null,
        ?string $tempGuestUser = null,
    ): Response {
        return $this->connector->send(new GetPortalsAdmissionsFormSubmissionsByUserCodeRequest($type, $tempGuestUser));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate|array<string, mixed>  $form
     */
    public function savePortalsAdmissionsFormSubmittedForm(AdmissionsFormOrchardFormForCreate|array $form): Response
    {
        return $this->connector->send(new SavePortalsAdmissionsFormSubmittedFormRequest($form));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\SubmissionOwner|array<string, mixed>  $form
     */
    public function updatePortalsAdmissionsFormSubmissionOwner(SubmissionOwner|array $form): Response
    {
        return $this->connector->send(new UpdatePortalsAdmissionsFormSubmissionOwnerRequest($form));
    }
}
