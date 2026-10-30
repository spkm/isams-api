<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\ListGroup;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all global custom global list groups.
 *
 * GET /api/systemconfiguration/listgroup/custom
 */
class GetCustomListGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListGroup::class;
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/listgroup/custom';
    }
}
