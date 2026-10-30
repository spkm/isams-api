<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\SmsMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/communicationhistory/sms
 */
class GetAccountCommunicationHistorySmsCommunicationHistoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = SmsMessage::class;
    public string $resultKey = 'smsMessages';

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/communicationhistory/sms';
    }
}
