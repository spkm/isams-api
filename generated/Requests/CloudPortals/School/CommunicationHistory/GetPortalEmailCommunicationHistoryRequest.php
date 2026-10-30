<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\EmailMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/history/emails
 */
class GetPortalEmailCommunicationHistoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmailMessage::class;
    public string $resultKey = 'emailMessages';

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/history/emails';
    }
}
