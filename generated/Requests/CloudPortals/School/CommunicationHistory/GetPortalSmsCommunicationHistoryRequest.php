<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\SmsMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/history/sms
 */
class GetPortalSmsCommunicationHistoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = SmsMessage::class;
    public string $resultKey = 'smsMessages';

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/history/sms';
    }
}
