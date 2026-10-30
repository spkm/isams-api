<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\PortalEmailDetails;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/emailoptions
 */
class GetEmailOptionEmailDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PortalEmailDetails::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/emailoptions';
    }
}
