<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\ListGroup;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\PrivateGlobalListGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all global list groups.
 *
 * GET /api/portals/listgroups
 */
class GetListGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PrivateGlobalListGroup::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/listgroups';
    }
}
