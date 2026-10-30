<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceApplicationFormListRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceEnquiryFormListRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance\GetFormInstanceRegistrationFormListRequest;

class FormInstanceResource extends BaseResource
{
    public function getApplicationFormList(): Response
    {
        return $this->connector->send(new GetFormInstanceApplicationFormListRequest());
    }

    public function getEnquiryFormList(): Response
    {
        return $this->connector->send(new GetFormInstanceEnquiryFormListRequest());
    }

    public function getRegistrationFormList(): Response
    {
        return $this->connector->send(new GetFormInstanceRegistrationFormListRequest());
    }
}
