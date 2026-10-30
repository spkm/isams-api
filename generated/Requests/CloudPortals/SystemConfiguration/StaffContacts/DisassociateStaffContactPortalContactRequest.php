<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\SystemConfiguration\PortalContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates a Staff member and a Portal.
 *
 * POST /api/portals/contacts/delete
 */
class DisassociateStaffContactPortalContactRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     */
    public function __construct(
        protected PortalContact|array $portalContact,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/contacts/delete';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->portalContact instanceof Data ? $this->portalContact->toArray() : $this->portalContact;
    }
}
