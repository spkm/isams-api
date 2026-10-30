<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\CloudPortals\EmailMessage;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailHistoryMessageRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalSmsCommunicationHistoryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CommunicationHistoryResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailHistoryMessageRequest
     */
    public function getMessage(int $emailId): EmailMessage
    {
        return $this->fetch(new GetPortalEmailHistoryMessageRequest(emailId: $emailId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\EmailMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalEmailCommunicationHistoryRequest
     */
    public function getPortalEmail(): Collection
    {
        return $this->fetch(new GetPortalEmailCommunicationHistoryRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\SmsMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory\GetPortalSmsCommunicationHistoryRequest
     */
    public function getPortalSms(): Collection
    {
        return $this->fetch(new GetPortalSmsCommunicationHistoryRequest());
    }
}
