<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\SmsMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/communicationhistory/sms/{smsId}
 */
class GetAccountCommunicationHistorySmsHistoryMessageByIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SmsMessage::class;

    public function __construct(
        protected int $smsId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/communicationhistory/sms/'.rawurlencode((string) $this->smsId);
    }
}
