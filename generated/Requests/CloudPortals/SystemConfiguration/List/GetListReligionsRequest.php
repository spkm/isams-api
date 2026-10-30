<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all religions.
 *
 * GET /api/portals/list/religions
 */
class GetListReligionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItem::class;
    public string $resultKey = 'items';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/religions';
    }
}
