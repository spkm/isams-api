<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsFormInstance\GetPortalsFormInstanceApplicationFormListRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsFormInstance\GetPortalsFormInstanceEnquiryFormListRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsFormInstance\GetPortalsFormInstanceRegistrationFormListRequest;

class AdmissionsPortalsFormInstanceResource extends BaseResource
{
    public function getPortalsFormInstanceApplicationFormList(): Response
    {
        return $this->connector->send(new GetPortalsFormInstanceApplicationFormListRequest());
    }

    public function getPortalsFormInstanceEnquiryFormList(): Response
    {
        return $this->connector->send(new GetPortalsFormInstanceEnquiryFormListRequest());
    }

    public function getPortalsFormInstanceRegistrationFormList(): Response
    {
        return $this->connector->send(new GetPortalsFormInstanceRegistrationFormListRequest());
    }
}
