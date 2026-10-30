<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/account/emailoptions/verification/commands/cancel
 */
class CancelEmailOptionEmailDetailsVerificationRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/emailoptions/verification/commands/cancel';
    }
}
