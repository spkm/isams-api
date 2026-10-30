<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\CommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\EmailMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/history/emails/{emailId}
 */
class GetPortalEmailHistoryMessageRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmailMessage::class;

    public function __construct(
        protected int $emailId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/history/emails/'.rawurlencode((string) $this->emailId);
    }
}
