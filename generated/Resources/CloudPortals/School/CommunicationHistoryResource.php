<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailHistoryMessageRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalSmsCommunicationHistoryRequest;

class CommunicationHistoryResource extends BaseResource
{
    public function getMessage(int $emailId): Response
    {
        return $this->connector->send(new GetPortalEmailHistoryMessageRequest($emailId));
    }

    public function getPortalEmail(): Response
    {
        return $this->connector->send(new GetPortalEmailCommunicationHistoryRequest());
    }

    public function getPortalSms(): Response
    {
        return $this->connector->send(new GetPortalSmsCommunicationHistoryRequest());
    }
}
