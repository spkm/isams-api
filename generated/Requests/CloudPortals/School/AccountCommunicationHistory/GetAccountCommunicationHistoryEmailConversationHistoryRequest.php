<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\EmailConversationMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/communicationhistory/emails/conversation/{conversationGuid}
 */
class GetAccountCommunicationHistoryEmailConversationHistoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmailConversationMessage::class;
    public string $resultKey = 'emailConversationMessages';

    public function __construct(
        protected string $conversationGuid,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/communicationhistory/emails/conversation/'.rawurlencode((string) $this->conversationGuid);
    }
}
