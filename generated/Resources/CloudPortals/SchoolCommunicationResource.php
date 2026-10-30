<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\DeleteCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\GetCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\UpdateCommunicationSmsDetailsRequest;

class SchoolCommunicationResource extends BaseResource
{
    public function deleteCommunicationSmsDetails(): Response
    {
        return $this->connector->send(new DeleteCommunicationSmsDetailsRequest());
    }

    public function getCommunicationSmsDetails(): Response
    {
        return $this->connector->send(new GetCommunicationSmsDetailsRequest());
    }

    public function updateCommunicationSmsDetails(string $mobileNumber): Response
    {
        return $this->connector->send(new UpdateCommunicationSmsDetailsRequest($mobileNumber));
    }
}
