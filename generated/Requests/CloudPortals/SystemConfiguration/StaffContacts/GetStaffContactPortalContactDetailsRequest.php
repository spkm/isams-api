<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\PortalContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a List of Staff members.
 *
 * GET /api/portals/contacts/{id}
 */
class GetStaffContactPortalContactDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PortalContact::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/contacts/'.rawurlencode((string) $this->id);
    }
}
