<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalLinkMigration\ConvertPortalLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalLinkMigration\DeletePortalLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalLinkMigration\GetPortalLinkMigrationInvalidPortalLinksRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalLinkMigration\MigratePortalLinkMigrationPortalLinkRequest;

class SchoolPortalLinkMigrationResource extends BaseResource
{
    public function convertPortalLinkMigrationPortalLink(int $id): Response
    {
        return $this->connector->send(new ConvertPortalLinkMigrationPortalLinkRequest($id));
    }

    public function deletePortalLinkMigrationPortalLink(int $id): Response
    {
        return $this->connector->send(new DeletePortalLinkMigrationPortalLinkRequest($id));
    }

    public function getPortalLinkMigrationInvalidPortalLinks(): Response
    {
        return $this->connector->send(new GetPortalLinkMigrationInvalidPortalLinksRequest());
    }

    public function migratePortalLinkMigrationPortalLink(int $id): Response
    {
        return $this->connector->send(new MigratePortalLinkMigrationPortalLinkRequest($id));
    }
}
