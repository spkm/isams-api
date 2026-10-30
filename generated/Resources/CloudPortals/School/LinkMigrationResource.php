<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\ConvertLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\DeleteLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\GetLinkMigrationInvalidPortalLinksRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\MigrateLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class LinkMigrationResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\ConvertLinkMigrationPortalLinkRequest
     */
    public function convert(int $id): Created
    {
        return $this->fetch(new ConvertLinkMigrationPortalLinkRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\DeleteLinkMigrationPortalLinkRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteLinkMigrationPortalLinkRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\GetLinkMigrationInvalidPortalLinksRequest
     */
    public function getInvalidPortalLinks(): mixed
    {
        return $this->fetch(new GetLinkMigrationInvalidPortalLinksRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\MigrateLinkMigrationPortalLinkRequest
     */
    public function migrate(int $id): Created
    {
        return $this->fetch(new MigrateLinkMigrationPortalLinkRequest(id: $id));
    }
}
