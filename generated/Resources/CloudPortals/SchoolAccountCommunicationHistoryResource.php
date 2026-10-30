<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailConversationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsHistoryMessageByIdRequest;

class SchoolAccountCommunicationHistoryResource extends BaseResource
{
    public function getAccountCommunicationHistoryEmailById(int $emailId): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistoryEmailByIdRequest($emailId));
    }

    public function getAccountCommunicationHistoryEmailCommunicationHistory(): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistoryEmailCommunicationHistoryRequest());
    }

    public function getAccountCommunicationHistoryEmailConversationHistory(string $conversationGuid): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistoryEmailConversationHistoryRequest($conversationGuid));
    }

    public function getAccountCommunicationHistorySmsCommunicationHistory(): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistorySmsCommunicationHistoryRequest());
    }

    public function getAccountCommunicationHistorySmsHistoryMessageById(int $smsId): Response
    {
        return $this->connector->send(new GetAccountCommunicationHistorySmsHistoryMessageByIdRequest($smsId));
    }
}
