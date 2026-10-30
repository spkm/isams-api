<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\ApplicantContactsResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\CallbackSubmissionResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\CommunicationsResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\DocumentResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\FileResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\FormInstanceResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\FormsResource;
use spkm\IsamsApi\Resources\CloudPortals\Admissions\VisitsResource;

class AdmissionsResource extends BaseResource
{
    public function applicantContacts(): ApplicantContactsResource
    {
        return new ApplicantContactsResource($this->connector);
    }

    public function callbackSubmission(): CallbackSubmissionResource
    {
        return new CallbackSubmissionResource($this->connector);
    }

    public function communications(): CommunicationsResource
    {
        return new CommunicationsResource($this->connector);
    }

    public function document(): DocumentResource
    {
        return new DocumentResource($this->connector);
    }

    public function file(): FileResource
    {
        return new FileResource($this->connector);
    }

    public function formInstance(): FormInstanceResource
    {
        return new FormInstanceResource($this->connector);
    }

    public function forms(): FormsResource
    {
        return new FormsResource($this->connector);
    }

    public function visits(): VisitsResource
    {
        return new VisitsResource($this->connector);
    }
}
