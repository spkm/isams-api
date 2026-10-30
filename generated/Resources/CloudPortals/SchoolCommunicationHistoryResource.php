<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailHistoryMessageRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalSmsCommunicationHistoryRequest;

class SchoolCommunicationHistoryResource extends BaseResource
{
    public function getPortalEmailCommunicationHistory(): Response
    {
        return $this->connector->send(new GetPortalEmailCommunicationHistoryRequest());
    }

    public function getPortalEmailHistoryMessage(int $emailId): Response
    {
        return $this->connector->send(new GetPortalEmailHistoryMessageRequest($emailId));
    }

    public function getPortalSmsCommunicationHistory(): Response
    {
        return $this->connector->send(new GetPortalSmsCommunicationHistoryRequest());
    }
}
