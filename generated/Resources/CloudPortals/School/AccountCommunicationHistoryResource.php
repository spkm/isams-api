<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Students\EmailMessage;
use spkm\IsamsApi\Data\Students\SmsMessage;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailConversationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsCommunicationHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsHistoryMessageByIdRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AccountCommunicationHistoryResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailByIdRequest
     */
    public function getEmail(int $emailId): EmailMessage
    {
        return $this->fetch(new GetAccountCommunicationHistoryEmailByIdRequest(emailId: $emailId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\EmailMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailCommunicationHistoryRequest
     */
    public function getEmailCommunicationHistory(): Collection
    {
        return $this->fetch(new GetAccountCommunicationHistoryEmailCommunicationHistoryRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\EmailConversationMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistoryEmailConversationHistoryRequest
     */
    public function getEmailConversationHistory(string $conversationGuid): Collection
    {
        return $this->fetch(new GetAccountCommunicationHistoryEmailConversationHistoryRequest(conversationGuid: $conversationGuid));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsHistoryMessageByIdRequest
     */
    public function getSms(int $smsId): SmsMessage
    {
        return $this->fetch(new GetAccountCommunicationHistorySmsHistoryMessageByIdRequest(smsId: $smsId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\SmsMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory\GetAccountCommunicationHistorySmsCommunicationHistoryRequest
     */
    public function getSmsCommunicationHistory(): Collection
    {
        return $this->fetch(new GetAccountCommunicationHistorySmsCommunicationHistoryRequest());
    }
}
