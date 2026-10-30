<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\DeleteCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\GetCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\UpdateCommunicationSmsDetailsRequest;

class CommunicationResource extends BaseResource
{
    public function deleteSmsDetails(): Response
    {
        return $this->connector->send(new DeleteCommunicationSmsDetailsRequest());
    }

    public function getSmsDetails(): Response
    {
        return $this->connector->send(new GetCommunicationSmsDetailsRequest());
    }

    public function updateSmsDetails(string $mobileNumber): Response
    {
        return $this->connector->send(new UpdateCommunicationSmsDetailsRequest($mobileNumber));
    }
}
