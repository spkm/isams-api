<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailConversationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsHistoryMessageByIdRequest;

class AccountCommunicationHistoryResource extends BaseResource
{
    public function getEmail(int $emailId): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistoryEmailByIdRequest($emailId));
    }

    public function getEmailCommunicationHistory(): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistoryEmailCommunicationHistoryRequest());
    }

    public function getEmailConversationHistory(string $conversationGuid): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistoryEmailConversationHistoryRequest($conversationGuid));
    }

    public function getSms(int $smsId): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistorySmsHistoryMessageByIdRequest($smsId));
    }

    public function getSmsCommunicationHistory(): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistorySmsCommunicationHistoryRequest());
    }
}
