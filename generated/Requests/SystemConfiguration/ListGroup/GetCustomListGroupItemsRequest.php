<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\ListGroup;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all items for a custom global list group.
 *
 * GET /api/systemconfiguration/listgroup/custom/{listType}
 */
class GetCustomListGroupItemsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItem::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function __construct(
        protected string $listType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/listgroup/custom/'.rawurlencode((string) $this->listType);
    }
}
