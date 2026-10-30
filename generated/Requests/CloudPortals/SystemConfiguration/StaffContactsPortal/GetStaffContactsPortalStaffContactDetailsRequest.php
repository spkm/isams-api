<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContactsPortal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\PortalContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all Staff members.
 *
 * GET /api/portals/contacts
 */
class GetStaffContactsPortalStaffContactDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PortalContact::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/contacts';
    }
}
