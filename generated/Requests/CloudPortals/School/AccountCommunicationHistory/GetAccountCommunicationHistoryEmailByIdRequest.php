<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\AccountCommunicationHistory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\EmailMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/communicationhistory/emails/{emailId}
 */
class GetAccountCommunicationHistoryEmailByIdRequest extends IsamsRequest
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
        return '/api/portals/account/communicationhistory/emails/'.rawurlencode((string) $this->emailId);
    }
}
