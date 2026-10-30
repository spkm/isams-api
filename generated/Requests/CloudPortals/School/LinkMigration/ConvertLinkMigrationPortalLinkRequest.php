<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Converts a portal link by its ID.
 *
 * POST /api/portals/invalidportalinks/{id}/convert
 */
class ConvertLinkMigrationPortalLinkRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/invalidportalinks/'.rawurlencode((string) $this->id).'/convert';
    }
}
