<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\PortalContact;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\AssociateStaffContactPortalContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\DisassociateStaffContactPortalContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\GetStaffContactDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\GetStaffContactPortalContactDetailsRequest;

class StaffContactsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     */
    public function associate(PortalContact|array $portalContact): Response
    {
        return $this->connector->send(new AssociateStaffContactPortalContactRequest($portalContact));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     */
    public function disassociate(PortalContact|array $portalContact): Response
    {
        return $this->connector->send(new DisassociateStaffContactPortalContactRequest($portalContact));
    }

    public function getStaffContactDetails(): Response
    {
        return $this->connector->send(new GetStaffContactDetailsRequest());
    }

    public function getStaffContactPortalContactDetails(int $id): Response
    {
        return $this->connector->send(new GetStaffContactPortalContactDetailsRequest($id));
    }
}
