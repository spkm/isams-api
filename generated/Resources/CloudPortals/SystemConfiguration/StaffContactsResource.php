<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\PortalContact;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\AssociateStaffContactPortalContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\DisassociateStaffContactPortalContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\GetStaffContactDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\GetStaffContactPortalContactDetailsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StaffContactsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\AssociateStaffContactPortalContactRequest
     */
    public function associate(PortalContact|array $portalContact): Created
    {
        return $this->fetch(new AssociateStaffContactPortalContactRequest(portalContact: $portalContact));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\PortalContact|array<string, mixed>  $portalContact
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\DisassociateStaffContactPortalContactRequest
     */
    public function disassociate(PortalContact|array $portalContact): Created
    {
        return $this->fetch(new DisassociateStaffContactPortalContactRequest(portalContact: $portalContact));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\PortalContact>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\GetStaffContactDetailsRequest
     */
    public function getStaffContactDetails(): Collection
    {
        return $this->fetch(new GetStaffContactDetailsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\PortalContact>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\StaffContacts\GetStaffContactPortalContactDetailsRequest
     */
    public function getStaffContactPortalContactDetails(int $id): Collection
    {
        return $this->fetch(new GetStaffContactPortalContactDetailsRequest(id: $id));
    }
}
