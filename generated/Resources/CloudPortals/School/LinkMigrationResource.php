<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\ConvertLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\DeleteLinkMigrationPortalLinkRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\GetLinkMigrationInvalidPortalLinksRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration\MigrateLinkMigrationPortalLinkRequest;

class LinkMigrationResource extends BaseResource
{
    public function convert(int $id): Response
    {
        return $this->connector->send(new ConvertLinkMigrationPortalLinkRequest($id));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteLinkMigrationPortalLinkRequest($id));
    }

    public function getInvalidPortalLinks(): Response
    {
        return $this->connector->send(new GetLinkMigrationInvalidPortalLinksRequest());
    }

    public function migrate(int $id): Response
    {
        return $this->connector->send(new MigrateLinkMigrationPortalLinkRequest($id));
    }
}
