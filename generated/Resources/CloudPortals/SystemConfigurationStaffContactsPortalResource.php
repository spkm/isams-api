<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\PortalContact;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContactsPortal\AssociateStaffContactsPortalContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContactsPortal\DisassociateStaffContactsPortalContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContactsPortal\GetStaffContactsPortalContactDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContactsPortal\GetStaffContactsPortalStaffContactDetailsRequest;

class SystemConfigurationStaffContactsPortalResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     */
    public function associateStaffContactsPortalContact(PortalContact|array $portalContact): Response
    {
        return $this->connector->send(new AssociateStaffContactsPortalContactRequest($portalContact));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     */
    public function disassociateStaffContactsPortalContact(PortalContact|array $portalContact): Response
    {
        return $this->connector->send(new DisassociateStaffContactsPortalContactRequest($portalContact));
    }

    public function getStaffContactsPortalContactDetails(int $id): Response
    {
        return $this->connector->send(new GetStaffContactsPortalContactDetailsRequest($id));
    }

    public function getStaffContactsPortalStaffContactDetails(): Response
    {
        return $this->connector->send(new GetStaffContactsPortalStaffContactDetailsRequest());
    }
}
