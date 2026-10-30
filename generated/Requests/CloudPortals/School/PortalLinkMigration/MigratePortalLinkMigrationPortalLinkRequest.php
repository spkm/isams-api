<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PortalLinkMigration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Migrates a portal link by its ID.
 *
 * POST /api/portals/invalidportalinks/{id}/migrate
 */
class MigratePortalLinkMigrationPortalLinkRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/invalidportalinks/'.rawurlencode((string) $this->id).'/migrate';
    }
}
