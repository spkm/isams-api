<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a portal link by its ID.
 *
 * DELETE /api/portals/invalidportalinks/{id}
 */
class DeleteLinkMigrationPortalLinkRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/invalidportalinks/'.rawurlencode((string) $this->id);
    }
}
