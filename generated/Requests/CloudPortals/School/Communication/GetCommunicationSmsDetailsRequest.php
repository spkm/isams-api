<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Communication;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\SmsDetails;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/communications/sms
 */
class GetCommunicationSmsDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SmsDetails::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/sms';
    }
}
