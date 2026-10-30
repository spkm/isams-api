<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceApplicationFormListRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceEnquiryFormListRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceRegistrationFormListRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FormInstanceResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceApplicationFormListRequest
     */
    public function getApplicationFormList(): mixed
    {
        return $this->fetch(new GetFormInstanceApplicationFormListRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceEnquiryFormListRequest
     */
    public function getEnquiryFormList(): mixed
    {
        return $this->fetch(new GetFormInstanceEnquiryFormListRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceRegistrationFormListRequest
     */
    public function getRegistrationFormList(): mixed
    {
        return $this->fetch(new GetFormInstanceRegistrationFormListRequest());
    }
}
