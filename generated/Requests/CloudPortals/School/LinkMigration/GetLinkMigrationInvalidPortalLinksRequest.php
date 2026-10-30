<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LinkMigration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a list of invalid portal links.
 *
 * GET /api/portals/invalidportalinks/list
 */
class GetLinkMigrationInvalidPortalLinksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/api/portals/invalidportalinks/list';
    }
}
